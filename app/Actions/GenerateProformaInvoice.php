<?php

namespace App\Actions;

use App\Models\Order;
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

class GenerateProformaInvoice
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
    public function handle(Order $order): string
    {
        return $this->generateInvoice($order);
    }

    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException|InvalidManipulation
     */
    public function asController(Order $order): string
    {
        return $this->handle($order);
    }


    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException
     */
    private function generateInvoice($order): string
    {
        $user = auth()->user();
        $order->load('orderItems');
        $outputFile = '/invoices/'. $user->id. '/'. $user->first_name. '_' .$user->last_name.'.pdf';

        $file = public_path('documents/proforma invoice.pdf');
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
            $this->fillData(format_date($user->created_at, 'dS M,'), 88, 0, 99, 66, [250,168,24], 12, 'I', );
            $this->fillData($order->reference, 86, 0, 20, 66, [250,168,24], 10, 'I', );
            $this->fillData($user->institution ?? $user->name, 90, 0, 20, 85, [250,168,24], 10, 'I', );

            $description = $order->orderItems[0]->itemable_type == 'ticket' ? $order->orderItems[0]->itemable?->title : "Reservation of exhibition booth no ".$order->orderItems[0]->itemable_id;
            $this->fillData($description, 100, 0, 25, 115, [45,23,24], 9, 'I', );

            $this->fillData($order->orderItems->count(), 225, 0, 25, 115, [45,23,24], 9, 'I');

            $this->fillData(format_amount($order->orderItems[0]->price, $order->currency), 275, 0, 20, 115, [45,23,24], 8, 'I');

            $this->fillData(format_amount($order->total_amount, $order->currency), 323, 0, 20, 115, [45,23,24], 8, 'B');

            $this->fillData(format_amount($order->total_amount, $order->currency), 323, 0, 20, 125, [45,23,24], 8, 'B');
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
