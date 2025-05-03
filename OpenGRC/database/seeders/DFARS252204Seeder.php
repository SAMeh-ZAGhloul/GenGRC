<?php

namespace Database\Seeders;

use App\Enums\ControlCategory;
use App\Enums\ControlEnforcementCategory;
use App\Enums\ControlType;
use App\Http\Controllers\HelperController;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use League\Csv\Statement;

class DFARS252204Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserting data into 'standards' table
        DB::table('standards')->insert([
            'name' => 'Defense Federal Acquisition Regulation Supplement (DFARS) 252.204',
            'code' => 'DFARS 252.204',
            'authority' => 'DoD',
            'reference_url' => 'https://www.acq.osd.gov/policy/dfars/current/index.html',
            'description' => 'DFARS 252.204-7012 is a critical clause that outlines cybersecurity requirements for 
            contractors working with the Department of Defense. It mandates that these organizations implement specific 
            security controls, largely based on NIST SP 800-171 standards, to protect covered defense information from 
            unauthorized access and cyber threats. Contractors are also required to report any cyber incidents that might 
            impact such information in a timely manner. Overall, the clause is designed to strengthen the cybersecurity 
            posture across the defense industrial base by ensuring sensitive data is adequately safeguarded and any 
            potential breaches are promptly addressed.',
        ]);

        $csv = Reader::createFromPath(resource_path('data/DFAR-252-204.csv'), 'r');
        $csv->setHeaderOffset(0);
        $records = (new Statement)->process($csv);

        // Retrieve the standard_id using DB Query Builder
        $standardId = DB::table('standards')->where('code', 'DFARS 252.204')->value('id');

        foreach ($records as $record) {
            // Inserting data into 'controls' table
            DB::table('controls')->insert([
                'standard_id' => $standardId,
                'code' => $record['Identifier'],
                'title' => $record['Security Requirement'],
                'type' => $record['Type'] ?? ControlType::OTHER,
                'category' => $record['Category'] ?? ControlCategory::UNKNOWN,
                'enforcement' => $record['Enforcement'] ?? ControlEnforcementCategory::MANDATORY,
                'discussion' => '',
                'description' => HelperController::linesToParagraphs($record['Description'], 'control-description-text'),
            ]);
        }
    }
}
