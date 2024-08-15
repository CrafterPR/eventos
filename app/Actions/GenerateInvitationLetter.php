<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\Filter\FilterException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use setasign\Fpdi\PdfReader\PdfReaderException;
use Spatie\Image\Exceptions\InvalidManipulation;

class GenerateInvitationLetter
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
    public function handle(User $user): string
    {
        return $this->generateLetter($user);
    }

    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException
     */
    public function asController(User $user): string
    {
        return $this->handle($user);
    }


    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException
     */
    private function generateLetter($user): string
    {
        $outputFile = '/invitations/'. $user->id. '/'. $user->first_name. '_' .$user->last_name.'.pdf';

        $file = public_path('documents/delegate_invitation_letter.pdf');
        $this->fpdi = new FPDI();
        $pageCount = $this->fpdi->setSourceFile($file);
        $this->fpdi->SetAuthor(config('app.name'));
        $this->fpdi->SetCreator(config('app.name'));
        $this->fpdi->SetSubject($user->first_name);
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $template = $this->fpdi->importPage($pageNo);
            $size = $this->fpdi->getTemplateSize($template);
            $this->fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);

            $this->fpdi->useTemplate($template);
            if ($pageNo == 1) {
                $this->fillData(format_date($user->created_at), 86, 0, 98, 66, [250,168,24], 12, 'I', );
                $this->fillData($user->name, 86, 0, 20, 85, [250,168,24], 12, 'I', );
            }
        }
        /*
         * date
         */


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
}
