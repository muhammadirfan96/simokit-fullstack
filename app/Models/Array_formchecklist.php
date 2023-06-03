<?php

namespace App\Models;

class Array_formchecklist
{
    protected $dataForm = [
        'sootblower' => ['FM-OPRBLR-005-013', '02', '02 Mei 2018'],
        'slagcooler' => ['FM-OPRBLR-005-006', '02', '02 Mei 2018'],
        'primary air fan' => ['FM-OPRBLR-005-003', '02', '16 September 2019'],
        'secondary air fan' => ['FM-OPRBLR-005-001', '02', '02 Mei 2018'],
        'induced draft fan' => ['FM-OPRBLR-005-002', '02', '02 Mei 2018'],
        'high primary fluidized fan' => ['FM-OPRBLR-005-011', '02', '02 Mei 2018'],
        'hydro test' => ['FM-OPRBLR-003-001', '00', '02 Mei 2018'],
        'supply oil pump' => ['FM-OPRBLR-005-004', '02', '02 Mei 2018'],
        'coal feeder' => ['FM-OPRBLR-005-005', '03', '02 Mei 2018'],
        'tombol discharge valve slagcooler' => ['FM-OPRBLR-005-007', '00', '02 Mei 2018'],
        'filling steam drum' => ['FM-OPRBLR-005-009', '02', '02 Mei 2018'],
        'boiler auxilliary' => ['FM-OPRBLR-005-010', '03', '02 Mei 2018'],
        'lower burner' => ['FM-OPRBLR-005-012', '02', '02 Mei 2018'],
        'furnace purging' => ['FM-OPRBLR-005-014', '02', '02 Mei 2018'],
        'pengoperasian lime stone' => ['FM-OPRBLR-005-015', '03', '02 Mei 2018'],
        'warming up auxilliary boiler' => ['FM-OPRBLR-004-001', '01', '02 Mei 2018'],
        'rubber ball cleaning' => ['FM-OPRTRB-001-015', '02', '02 Mei 2018'],
        'travelling screen dan screen wash pump' => ['FM-OPRTRB-001-024', '01', '02 Mei 2018'],
        'feed water pump' => ['FM-OPRTRB-001-001', '02', '02 Mei 2018'],
        'HP oil pump' => ['FM-OPRTRB-001-002', '02', '02 Mei 2018'],
        'condensate extrantion pump' => ['FM-OPRTRB-001-003', '02', '02 Mei 2018'],
        'C.O. supply system pendingin bantu' => ['FM-OPRTRB-001-004', '01', '02 Mei 2018'],
        'circulating water pump' => ['FM-OPRTRB-001-005', '02', '02 Mei 2018'],
        'DC oil pump' => ['FM-OPRTRB-001-006', '02', '02 Mei 2018'],
        'CCS' => ['FM-OPRTRB-001-007', '02', '02 Mei 2018'],
        'AC oil pump' => ['FM-OPRTRB-001-008', '02', '02 Mei 2018'],
        'close circulating water pump' => ['FM-OPRTRB-001-009', '02', '02 Mei 2018'],
        'jacking oil pump' => ['FM-OPRTRB-001-010', '02', '02 Mei 2018'],
        'turning gear' => ['FM-OPRTRB-001-011', '00', '02 Mei 2018'],
        'vacum pump' => ['FM-OPRTRB-001-012', '02', '02 Mei 2018'],
        'sea water pretreatment' => ['FM-OPRTRB-001-013', '00', '02 Mei 2018'],
        'uap perapat poros turbin' => ['FM-OPRTRB-001-014', '02', '02 Mei 2018'],
        'drain pit pump' => ['FM-OPRTRB-001-016', '00', '02 Mei 2018'],
        'digital electric hydraulic' => ['FM-OPRTRB-001-017', '02', '02 Mei 2018'],
        'CWP connecting valve' => ['FM-OPRTRB-001-018', '01', '02 Mei 2018'],
        'operasi 3 CWP' => ['FM-OPRTRB-001-019', '01', '02 Mei 2018'],
        'emergency MOV debris filter' => ['FM-OPRTRB-001-020', '02', '02 Mei 2018'],
        'runback' => ['FM-OPRTRB-001-021', '03', '02 Mei 2018'],
        'C.O. EH oil pump' => ['FM-OPRTRB-001-022', '00', '26 November 2020'],
        'filter system' => ['FM-SPG-OPS-039', '00', '02 Mei 2018'],
        'C.O. CWP Dengan Operasi 3 CWP' => ['FM-OPRTRB-001-026', '00', '02 Mei 2018'],
        'emergency pengoperasian transporter' => ['FM-OPRBLR-005-008', '00', '02 Mei 2018'],
        'conveying air compressor' => ['FM-OPRELC-001-011', '02', '02 Mei 2018'],
        'fast cut common PS' => ['FM-OPRELC-001-001', '01', '02 Mei 2018'],
        'supply tegangan UAT unit 2 ke unit 1' => ['FM-OPRELC-001-001', '00', '02 Mei 2018'],
        'warming up EDG' => ['FM-OPRELC-001-003', '02', '02 Mei 2018'],
        'operasi manual EDG' => ['FM-OPRELC-001-004', '02', '02 Mei 2018'],
        'pengetesan manual EDG' => ['FM-OPRELC-001-005', '02', '02 Mei 2018'],
        'IN rack OUT switchgear 400 V' => ['FM-OPRELC-001-006', '02', '02 Mei 2018'],
        'IN rack OUT switchgear 6 KV' => ['FM-OPRELC-001-007', '02', '02 Mei 2018'],
        'rack IN switchgear 400 V' => ['FM-OPRELC-001-008', '02', '02 Mei 2018'],
        'rack IN switchgear 6 KV' => ['FM-OPRELC-001-009', '02', '02 Mei 2018'],
        'pengatur beban' => ['FM-OPRTRB-001-023', '01', '02 Mei 2018'],
        'feeding material bed' => ['FM-OPRBLR-005-019', '00', '12 April 2021'],
        'AC central' => ['FM-OPRELC-001-015', '00', '12 April 2021'],
        'fire fighting system' => ['FM-OPRELC-001-010', '02', '02 Mei 2018'],
    ];

    public function getForm($key)
    {
        return $this->dataForm[$key];
    }
}
