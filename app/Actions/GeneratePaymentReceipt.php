<?php

namespace App\Actions;

use App\Models\Order;
use App\Models\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\CrossReference\CrossReferenceException;
use setasign\Fpdi\PdfParser\Filter\FilterException;
use setasign\Fpdi\PdfParser\PdfParserException;
use setasign\Fpdi\PdfParser\Type\PdfTypeException;
use setasign\Fpdi\PdfReader\PdfReaderException;

class GeneratePaymentReceipt
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
        return $this->generateReceipt($order);
    }

    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException
     */
    public function asController(Order $order): string
    {
        return $this->handle($order);
    }

    public function jsonResponse(string $receiptUrl): JsonResponse
    {
        return new JsonResponse([
            "receiptUrl" => $receiptUrl,
        ]);
    }

    /**
     * @throws CrossReferenceException
     * @throws PdfReaderException
     * @throws PdfParserException
     * @throws PdfTypeException
     * @throws FilterException
     */
    private function generateReceipt($order): string
    {
        $outputFile = '/receipts/'. $order->reference.'.pdf';

        $file = public_path('documents/receipt_template.pdf');
        $this->fpdi = new FPDI;
        $this->fpdi->setSourceFile($file);
        $this->fpdi->SetAuthor(config('app.name'));
        $this->fpdi->SetCreator(config('app.name'));
        $this->fpdi->SetSubject($order->title);
        $template = $this->fpdi->importPage(1);
        $size = $this->fpdi->getTemplateSize($template);
        $this->fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
        $this->fpdi->useTemplate($template);
        /*
         * date
         */
        $this->fillData(format_time($order->created_at, 'd/m/Y'), 89, 0, 100, 93, [256, 256, 256], 12, 'I', 'R');
        $this->fillData($order->reference, 63, 0, 0, 125, [40, 10, 56], 10, 'I');
        /*
         * customer data
         */
        $this->fillData($order->user->name, 90, 0, 120, 125, [40, 10, 56], 10, 'I', 'R');
        $this->fillData($order->user->email, 90, 0, 120, 130, [40, 10, 56], 10, 'I', 'R');
        $this->fillData($order->user->mobile, 90, 0, 120, 135, [40, 10, 56], 10, 'I', 'R');
        $this->fillData($order->user->institution, 90, 0, 120, 140, [40, 10, 56], 10, 'I', 'R');
        /**
         * Item details
         */
        $item = PaymentService::where('code', $order->service_code)->first()?->name;
        $this->fillData("Purchase of a {$item} for  KIW 2023 - CW ED", 65, 0, 0, 196, [40, 10, 56], 9, 'I', );
        $this->fillData($order->orderItems->count() ?? 1, 170, 0, 8, 196, [40, 10, 56], 9, 'I', );

        $this->fillData(format_amount($order->orderItems[0]->price, $order->orderItems[0]->currency), 170, 0, 50, 196, [40, 10, 56], 9, 'I', );

        $this->fillData(format_amount($order->total_amount, $order->orderItems[0]->currency), 170, 0, 100, 196, [40, 10, 56], 9, 'I', );

        $this->fillData(format_amount($order->total_amount, $order->orderItems[0]->currency), 170, 0, 100, 213, [256, 256, 256], 9, 'B', );

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
}
