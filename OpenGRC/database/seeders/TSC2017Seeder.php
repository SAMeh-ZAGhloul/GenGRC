<?php

namespace Database\Seeders;

use App\Enums\ControlCategory;
use App\Enums\ControlEnforcementCategory;
use App\Enums\ControlType;
use App\Enums\StandardStatus;
use App\Http\Controllers\HelperController;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Exception;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\UnavailableStream;

class TSC2017Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @throws UnavailableStream
     * @throws Exception
     */
    public function run(): void
    {
        // Inserting data into 'standards' table
        DB::table('standards')->insert([
            'name' => 'Trust Services Criteria (TSC) 2017',
            'code' => 'TSC2017a',
            'authority' => 'AICPA',
            'status' => StandardStatus::IN_SCOPE,
            'reference_url' => 'https://www.aicpa.org/interestareas/frc/assuranceadvisoryservices/aicpasoc2report.html',
            'description' => "The Trust Services Criteria (TSC) 2017 are a set of professional attestation and advisory services based on a core set of principles and criteria that address the risks and opportunities of IT-enabled systems and privacy programs. The TSC 2017 are used by practitioners to evaluate and report on controls at service organizations that provide services to user entities when those controls are likely to be relevant to user entities' internal control over financial reporting.",
        ]);

        $csv = Reader::createFromPath(resource_path('data/TSC2017.csv'), 'r');
        $csv->setHeaderOffset(0);
        $records = (new Statement)->process($csv);

        // Retrieve the standard_id using DB Query Builder
        $standardId = DB::table('standards')->where('code', 'TSC2017a')->value('id');

        foreach ($records as $record) {
            // Inserting data into 'controls' table
            DB::table('controls')->insert([
                'standard_id' => $standardId,
                'code' => $record['code'],
                'title' => $record['title'],
                'type' => $record['Type'] ?? ControlType::OTHER,
                'category' => $record['Category'] ?? ControlCategory::UNKNOWN,
                'enforcement' => $record['Enforcement'] ?? ControlEnforcementCategory::OTHER,
                'discussion' => '',
                //                'description' => HelperController::linesToParagraphs($record['description'], 'control-description-text'),
                'description' => $record['description'],
            ]);
        }
    }
}
