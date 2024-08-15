<?php

namespace App\Actions;

use App\Models\OrderItem;
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

class GenerateOrderItemTicket
{
    use AsAction;

    private Fpdi $fpdi;

    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException
     */
    public function handle(OrderItem $orderItem): string
    {
        return $this->generateReceipt($orderItem);
    }

    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException
     */
    public function asController(OrderItem $orderItem): string
    {
        return $this->handle($orderItem);
    }

    public function jsonResponse(string $ticketUrl): JsonResponse
    {
        return new JsonResponse([
            "ticketUrl" => $ticketUrl,
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
    private function generateReceipt($orderItem): string
    {
        $outputFile = '/tickets/'. $orderItem->reference_no.'.pdf';

        $file = public_path('documents/ticket_template.pdf');
        $this->fpdi = new FPDI();
        $this->fpdi->setSourceFile($file);
        $this->fpdi->SetAuthor(config('app.name'));
        $this->fpdi->SetCreator(config('app.name'));
        $this->fpdi->SetSubject($orderItem->title);
        $template = $this->fpdi->importPage(1);
        $size = $this->fpdi->getTemplateSize($template);
        $this->fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $this->fpdi->useTemplate($template);
        /*
         * date
         */
        $this->fillData($orderItem->reference_no, 10, 0, 25, 46, [250,250,250], 14, 'I', );

        $this->fillData("Kenya Innovation Week 2023: Commonwealth Edition", 70, 0, 70, 79, [250,168,24], 12, 'I', );

        $this->fillData("27th Nov - 1st Dec 2023  NAIROBI hosted @ College of Insurance", 82, 0, 75, 94, [250,168,24], 12, 'I', );


        $this->fillData(format_amount($orderItem->total, $orderItem->currency), 48, 0, 42, 110, [250,168,24], 12, 'I', );

        $this->fillData($orderItem->itemable?->title, 48, 0, 42, 124, [250,168,24], 12, 'I', );

        $this->fillData($orderItem->order->reference, 48, 0, 40, 136, [250,168,24], 12, 'I', );

        $this->fillData($orderItem->user->name, 50, 0, 43, 152, [250,168,24], 12, 'I', );

        $url = route('checkin-validate', ['ticket_no' => $orderItem->reference_no], true);

        $dataUri = (new QRCode)->render($url);

        $this->fpdi->Image($dataUri, 135, 102, 55, 55, 'png');

        $content = $this->fpdi->Output('', 'S');

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

    /**
     */
    private function getQRCode($orderItem)
    {
        return QrCode::size(512)
            ->color(250, 168, 24)
            ->errorCorrection('H')
            ->margin(1)
            ->generate("Ticket No:" . $orderItem->reference_no);
    }
}
