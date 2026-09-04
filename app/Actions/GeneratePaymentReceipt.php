<?php

namespace App\Actions;

use App\Enum\Currency;
use App\Models\PurchaseOrder;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
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
    public function handle(PurchaseOrder $order): string
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
    public function asController(PurchaseOrder $order): string
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
    private function generateReceipt(PurchaseOrder $order): string
    {
        try {
        $outputFile = '/files/receipts/'. $order->reference.'.pdf';

        $file = public_path('files/KICP_receipt_template.pdf');
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
        $this->fillData(format_time($order->created_at, 'd/M/Y'), 89, 0, 85, 83, [256, 256, 256], 12, 'I', 'R');
        $this->fillData($order->pesaflow_response->invoice_number ?? 'KICP'.time(), 63, 0, 10, 120, [40, 10, 56], 10, 'I');
        /*
         * customer data
         */
        $this->fillData($order->user->name.' - '. $order->user->email.', '.$order->organization, 80, 0, 65, 135, [40,
            10, 56], 10, 'I', 'R');
        $this->fillData($order->reference, 80, 0, 30, 157, [40,
            10, 56], 10, 'I', 'R');
        /**
         * Item details
         */
            $text = 'Purchase of tickets for ';
            $height = 0;
            $total = 0;
            foreach($order->tickets as $t) {
                if (is_array($t)) {
                    $text .= $t['type'] ?? ($t['type'] ?? 'N/A') . ', ';
                    $this->fillData(rtrim($text, ', '), 65, 0, 0, (188 + $height), [40, 10, 56], 9, 'I', );
                    $this->fillData($t['count'] ?? 1, 170, 0, 8, (188 + $height), [40, 10, 56], 9, 'I', );
                    $this->fillData(number_format($order->currency == Currency::KES ? $t['price'] : $t['usdPrice'], 2),
                    170, 0,
                    50, (188 + $height),
                                    [40,
                        10, 56], 9, 'I', );
                    $sub_total = $order->currency == Currency::KES ? ($t['price'] * $t['count']) : ($t['usdPrice'] *
                        $t['count']);
                    $total += $sub_total;
                    $this->fillData(format_amount($total,$order->currency), 170, 0,
                    100, (188 + $height),
                                    [40,
                        10, 56], 9, 'I');
                    $height +=10;
                }
            }
            $this->fillData(format_amount($total,$order->currency), 170, 0,
                            100, 230,
                            [40,
                                10, 56], 14, 'B');


        $content = $this->fpdi->Output('', 'S');

        Storage::disk('public')->put($outputFile, $content);

        return $outputFile;

        } catch (\Exception $e) {
            throw new \RuntimeException("Failed to generate receipt: " . $e->getMessage(), 0, $e);
        }
    }

    private function fillData($text, $width, $height, $x, $y, $color = [46, 0, 34], $fontSize = 14, $fontStyle = '', $align = 'C'): void
    {
        $this->fpdi->SetFont('helvetica', $fontStyle, $fontSize);
        $this->fpdi->SetTextColor($color[0], $color[1], $color[2]);
        $this->fpdi->setXY($x, $y);
        $this->fpdi->Cell($width, $height, $text, 0, 1, $align);
    }
}
