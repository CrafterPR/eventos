<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =
            [
                [
                    'key' => 'welcome_invite',
                    'subject' => 'Welcome to the Kenya Innovation Week 2023 - Commonwealth Edition',
                    'body' => "Thank you for registering to participate in this event, The theme for this years event is {theme} \n
                               and we wish you great time as you prepare to be part of this commonwealth endeavour.\n
                                Find attached a copy of the info pack for more details"
                               ],
                [
                    'key' => 'payment_notification',
                    'subject' => 'We confirm receipt of your payment for ticket',
                    'body' => "We acknowledge receipt of payment as follows \n\n
                                <p><strong>***** Payment Details *****</strong>  \n</p>
                                <p><strong>- Item paid for: {item}</strong> \n</p>
                                <p><strong>- Our Reference: {reference}</strong> \n</p>
                                <p><strong>- Payment Amount: {amount}</strong> \n</p>
                                <p><strong>- Transaction Ref #: {transaction_reference}</strong>\n</p>
                                <p><strong>- Payment Date: {date}</strong> \n</p>
                                <p><strong>- Payment Method: {method}</strong> \n\n\n</p>"
                ],
                [
                    'key' => 'ticket_notification',
                    'subject' => 'Your E-ticket for KIW2023 CW ED Event on the 27th Nov - 1st Dec',
                    'body' => "Thank you for your continued support, This is your {ticket_type} E-ticket for the Event. Make sure to have you ticket for scanning at the entrance.:
                                <p><strong>***** Ticket Details *****</strong>  \n</p>
                                <p><strong>- Ticket Number: {reference_no}</strong> \n</p>
                                <p><strong>- Ticket Type: {ticket_type}</strong> \n</p>
                                <p><strong>- Delegate Name: {name}</strong> \n</p>
                                <p><strong>- Payment Amount: {amount}</strong> \n</p>
                                <p><strong>- Payment Date: {date}</strong> \n</p>
                                <p><strong>- Paid By: {payer}</strong> \n\n\n</p>"
                ],
                [
                    'key' => 'payment_reminder',
                    'subject' => 'Reminder to complete payment for your ticket for upcoming KIW2023 CW ED',
                    'body' => "Thank you for choosing to participate in the upcoming KIW2023 CW ED Event on the 27th Nov - 1st Dec. \n
                               We received request for purchase of {item} on {date} but seems like you had some trouble in completing the payment of {amount}. \n
                               Kindly, try making the payment using the link below to secure a chance to participate in the event\n\n
                               <a href='{link}'>Pay Now</a>"
                ],
                [
                    'key' => 'password_reset',
                    'subject' => 'You requested for Password reset on the KIW2023 CW ED Portal',
                    'body' => ''
                ],
                [
                    'key' => 'send_coupon',
                    'subject' => 'Coupons for signing up as delegates for the KIW2023 CW ED',
                    'body' => "We acknowledge your interest to participate in the KIW CW-ED 2023. We have generated a {no_of_delegates} delegate coupon for you.\n
                    Below the Coupon code details\n
                        <p><strong>***** Delegate Coupon *****</strong>  \n</p>
                                <p><strong>- Coupon Code: {code}</strong> \n</p>
                                <p><strong>- Organization: {organization}</strong> \n</p>
                                <p><strong>- No of Delegates: {no_of_delegates}</strong> \n</p>
                                <p><strong>- Coupon Type: {type}</strong> \n</p>
                               You can use <a href='https://kenyainnovationweek.com/registration/{code}'>this link</a> to signup with the coupon above."
                ],
                [
                    'key' => 'send_proforma_invoice',
                    'subject' => 'Your proforma Invoice for KIW2023 CW ED request',
                    'body' => "Please note that this is a Proforma Invoice. \n
                                The KIW team will be reaching out to you to send the Invoice with the payment details. If you do not hear from us within 3 days please reach out to us at
 /n accounts@innovationagency.go.ke or call us 0792446976 \n
                        <p><strong>***** Invoice no {invoice_number} *****</strong>  \n</p>
                                <p><strong>- Service: {service}</strong> \n</p>
                                <p><strong>- Total amount: {amount}</strong> \n</p>
                                <p><strong>- Order number: {reference}</strong> \n</p>
                              For more details, see the attached document."
                ]
            ];
        foreach ($data as $item) {
            EmailTemplate::updateOrCreate(['key' => $item['key']], $item);
        }
    }
}
