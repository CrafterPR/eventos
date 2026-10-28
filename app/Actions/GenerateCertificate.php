<?php

namespace App\Actions;

use App\Models\Delegate;
use chillerlan\QRCode\QRCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\Filter\FilterException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use setasign\Fpdi\PdfReader\PdfReaderException;
use Spatie\Image\Exceptions\InvalidManipulation;

class GenerateCertificate
{
    use AsAction;

    private Fpdi $fpdi;

    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException
     * @throws InvalidManipulation
     */
    public function handle(Delegate $delegate): string
    {
        return $this->generateCertificate($delegate);
    }

    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException
     * @throws InvalidManipulation
     */
    public function asController(Delegate $delegate): string
    {
        $updates = ['certificate_generated_at' => now()];

        if (blank($delegate->serial_number)) {
            $updates['serial_number'] = 'SN' . time();
        }

        $delegate->update($updates);
        return $this->handle($delegate);
    }

    public function jsonResponse(string $certificateUrl): JsonResponse
    {
        return new JsonResponse([
            'certificateUrl' => $certificateUrl,
        ]);
    }

    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException
     * @throws InvalidManipulation
     */
    private function generateCertificate($delegate): string
    {
        $outputFile = '/certificates/' . $delegate->id . '.pdf';

        $delegate->refresh();

//        dd($delegate);

        $file = public_path('documents/' . $delegate->type . '_template.pdf');
        $this->fpdi = new Fpdi;
        $this->fpdi->setSourceFile($file);
        $this->fpdi->SetAuthor(config('app.name'));
        $this->fpdi->SetCreator(config('app.name'));
        $this->fpdi->SetSubject($delegate->name);
        $template = $this->fpdi->importPage(1);
        $size = $this->fpdi->getTemplateSize($template);
        $this->fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $this->fpdi->useTemplate($template);
        /*
         * date
         */
        $this->fillData($delegate->serial_number, 10, 0, 25, 46, [250, 250, 250], 14, 'I');

        $this->fillData($delegate->name, 100, 0, 150, 170, [124, 199, 239], 30, 'I');

        $url = route('certificate-validate', ['serial_number' => $delegate->serial_number], true);

        $dataUri = (new QRCode)->render($url);

        $this->fpdi->Image($dataUri, 200, 210, 30, 30, 'png');

        $content = $this->fpdi->Output('', 'I');

        Storage::disk('public')->put($outputFile, $content);

        return $outputFile;
    }

    private function fillData($text, $width, $height, $x, $y, $color = [46, 0, 34], $fontSize = 14, $fontStyle = '', $align = 'C'): void
    {
        $this->fpdi->SetFont('helvetica', $fontStyle, $fontSize);
        $this->fpdi->SetTextColor($color[0], $color[1], $color[2]);
        $this->fpdi->setXY($x, $y);
        $this->fpdi->Cell($width, $height, $text, 0, 1, $align);
    }

    private function getQRCode($delegate)
    {
        return QRCode::size(512)
            ->color(250, 168, 24)
            ->errorCorrection('H')
            ->margin(1)
            ->generate('Serial No:' . $delegate->reference_no);
    }
}
