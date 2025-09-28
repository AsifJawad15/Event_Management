<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'How do I register for an event or conference on your website?',
                'answer' => 'To register for an event or conference, simply navigate to the event\'s page and click the "Register" button. Fill out the required information and complete the payment process, if applicable. You will receive a confirmation email with your registration details.'
            ],
            [
                'question' => 'Can I get a refund if I am unable to attend an event?',
                'answer' => 'Refund policies vary depending on the event. Please refer to the specific event page for details on refunds and cancellations. If you have any questions or need assistance, you can contact our support team through the "Contact Us" page.'
            ],
            [
                'question' => 'How can I become a sponsor for an event?',
                'answer' => 'To become a sponsor, visit our "Sponsorship Opportunities" page where you will find detailed information on sponsorship packages and benefits. Fill out the sponsorship application form, and our team will get in touch with you to discuss further steps and how we can collaborate.'
            ],
            [
                'question' => 'What are the available payment methods for event registration?',
                'answer' => 'We accept various payment methods including major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers. All payments are processed securely through our encrypted payment gateway to ensure your financial information is protected.'
            ],
            [
                'question' => 'Can I transfer my registration to another person?',
                'answer' => 'Yes, registration transfers are generally allowed up to 7 days before the event date. Please contact our support team with the original registrant\'s information and the new attendee\'s details. A small administrative fee may apply for registration transfers.'
            ],
            [
                'question' => 'What should I do if I don\'t receive my event confirmation email?',
                'answer' => 'First, please check your spam or junk folder as confirmation emails sometimes get filtered there. If you still can\'t find it, contact our support team with your registration details, and we will resend your confirmation email promptly.'
            ],
            [
                'question' => 'Are there group discounts available for multiple registrations?',
                'answer' => 'Yes, we offer group discounts for multiple registrations. Discounts typically start at 3 or more registrations from the same organization. Please contact our sales team for specific group pricing and to arrange group registration.'
            ],
            [
                'question' => 'What COVID-19 safety measures are in place for events?',
                'answer' => 'We follow all local health guidelines and regulations. This may include vaccination requirements, mask mandates, social distancing measures, and enhanced sanitization protocols. Specific safety measures will be communicated to registered attendees before each event.'
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
