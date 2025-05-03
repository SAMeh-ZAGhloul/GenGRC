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

class CMMC2L2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Inserting data into 'standards' table
        DB::table('standards')->insert([
            'name' => 'CMMC Level 2',
            'code' => 'CMMC 2.0 - Level 2',
            'authority' => 'DoD',
            'reference_url' => 'https://www.acq.osd.gov/cmmc/docs/CMMC_Model_2.0_Final.pdf',
            'description' => 'The CMMC Level 2 standard is designed to provide a baseline level of security for organizations that process, store, or 
            transmit Controlled Unclassified Information (CUI). It establishes a minimum level of security controls that organizations must implement to protect CUI.',
        ]);

        $csv = Reader::createFromPath(resource_path('data/CMMC-2-L2.csv'), 'r');
        $csv->setHeaderOffset(0);
        $records = (new Statement)->process($csv);

        // Retrieve the standard_id using DB Query Builder
        $standardId = DB::table('standards')->where('code', 'CMMC 2.0 - Level 2')->value('id');

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
