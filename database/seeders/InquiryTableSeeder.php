<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InquiryTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('inquiry')->insert([
            [
                'id' => 12,
                'PublicUser_id' => 6,
                'MCMC_id' => null,
                'Agency_id' => null,
                'NewsTitle' => 'Social Media Post About Traffic Fine Discount',
                'NewsContent' => 'A viral post claims JPJ is giving a 50% discount on traffic fines for a week.',
                'NewsSource' => 'https://twitter.com/fakeclaim',
                'InquiryDate' => now()->format('Y-m-d H:i:s'),
                'InquiryStatus' => 'Pending',
                'attachment' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'PublicUser_id' => 7,
                'MCMC_id' => null,
                'Agency_id' => null,
                'NewsTitle' => 'Fake COVID-19 Vaccine Certificate Circulating',
                'NewsContent' => 'Screenshots showing a "free vaccine cert" site went viral. Is it legit?',
                'NewsSource' => 'https://telegram.link/fakevax',
                'InquiryDate' => now()->subDays(1)->format('Y-m-d H:i:s'),
                'InquiryStatus' => 'Assigned',
                'attachment' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'PublicUser_id' => 7,
                'MCMC_id' => null,
                'Agency_id' => null,
                'NewsTitle' => 'Government Will Give Free Laptops to All Students',
                'NewsContent' => 'A Facebook page claims all students will receive free laptops next month.',
                'NewsSource' => 'https://facebook.com/laptop-gov-claim',
                'InquiryDate' => now()->subDays(2)->format('Y-m-d H:i:s'),
                'InquiryStatus' => 'Under Investigation',
                'attachment' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'PublicUser_id' => 6,
                'MCMC_id' => null,
                'Agency_id' => null,
                'NewsTitle' => 'Petrol Price Drop to RM1.50 Next Week',
                'NewsContent' => 'Post on WhatsApp chain message claims fuel prices will drop significantly.',
                'NewsSource' => 'WhatsApp Message',
                'InquiryDate' => now()->subDays(3)->format('Y-m-d H:i:s'),
                'InquiryStatus' => 'Resolved',
                'attachment' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'PublicUser_id' => 6,
                'MCMC_id' => null,
                'Agency_id' => null,
                'NewsTitle' => 'MCMC Shutting Down TikTok in Malaysia',
                'NewsContent' => 'An IG post claims that MCMC will ban TikTok by next month.',
                'NewsSource' => 'https://instagram.com/fakepost',
                'InquiryDate' => now()->subDays(4)->format('Y-m-d H:i:s'),
                'InquiryStatus' => 'Verified',
                'attachment' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'PublicUser_id' => 8,
                'MCMC_id' => null,
                'Agency_id' => 5,
                'NewsTitle' => 'JPJ Offers 80% Discount on All Traffic Summonses for One Week',
                'NewsContent' => 'A viral social media post claims that the Road Transport Department (JPJ) is offering an 80% discount on all outstanding traffic summonses for one week starting next Monday. The post also states that vehicle owners can claim the discount by registering through a provided website link and making a small processing payment of RM10. Many users have shared the information online, but the authenticity of the announcement has not been verified.',
                'NewsSource' => 'Facebook',
                'InquiryDate' => '2026-06-17',
                'InquiryStatus' => 'In Progress',
                'attachment' => null,
                'created_at' => '2026-06-17 02:18:46',
                'updated_at' => '2026-06-17 02:34:43',
            ],
            [
                'id' => 18,
                'PublicUser_id' => 9,
                'MCMC_id' => null,
                'Agency_id' => 6,
                'NewsTitle' => 'PDRM Announces Nationwide Roadblocks for All Vehicles Starting Next Week',
                'NewsContent' => 'A viral message circulating on social media claims that the Royal Malaysia Police (PDRM) will conduct nationwide roadblocks on all major highways beginning next week. According to the message, every vehicle owner must present their MyKad, driving license, and bank account information during inspection. The message encourages the public to share the information widely to avoid penalties. However, the authenticity of this announcement has not been verified.',
                'NewsSource' => 'WhatsApp Message',
                'InquiryDate' => '2026-06-17',
                'InquiryStatus' => 'In Progress',
                'attachment' => null,
                'created_at' => '2026-06-17 02:42:29',
                'updated_at' => '2026-06-17 02:47:46',
            ],
        ]);
    }
}
