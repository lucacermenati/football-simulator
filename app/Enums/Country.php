<?php

namespace App\Enums;

enum Country: string
{
    // Western Europe
    case Italy = 'IT';
    case Switzerland = 'CH';
    case France = 'FR';
    case Belgium = 'BE';
    case Germany = 'DE';
    case Austria = 'AT';
    case Netherlands = 'NL';
    case Portugal = 'PT';
    case Spain = 'ES';
    case Ireland = 'IE';

    // United Kingdom & Ireland
    case UnitedKingdom = 'GB';
    case England = 'GB_ENG';
    case Scotland = 'GB_SCT';
    case Wales = 'GB_WLS';
    case NorthernIreland = 'GB_NIR';

    // Northern Europe
    case Denmark = 'DK';
    case Sweden = 'SE';
    case Norway = 'NO';
    case Finland = 'FI';
    case Iceland = 'IS';

    // Central & Eastern Europe
    case Poland = 'PL';
    case CzechRepublic = 'CZ';
    case Slovakia = 'SK';
    case Hungary = 'HU';
    case Slovenia = 'SI';
    case Croatia = 'HR';
    case Serbia = 'RS';
    case Lithuania = 'LT';
    case Latvia = 'LV';
    case Estonia = 'EE';
    case Romania = 'RO';
    case Moldova = 'MD';
    case Bulgaria = 'BG';
    case Ukraine = 'UA';
    case Russia = 'RU';
    case Greece = 'GR';
    case Turkey = 'TR';
    case Montenegro = 'ME';

    // South America
    case Brazil = 'BR';
    case Argentina = 'AR';
    case Peru = 'PE';
    case Venezuela = 'VE';

    // North America & Oceania
    case UnitedStates = 'US';
    case Canada = 'CA';
    case Australia = 'AU';
    case NewZealand = 'NZ';

    // Africa
    case Nigeria = 'NG';
    case Uganda = 'UG';
    case Egypt = 'EG';

    // Middle East
    case Jordan = 'JO';
    case SaudiArabia = 'SA';
    case Iran = 'IR';
    case Israel = 'IL';

    // Asia
    case Japan = 'JP';
    case SouthKorea = 'KR';
    case China = 'CN';
    case Thailand = 'TH';
    case Vietnam = 'VN';
    case Indonesia = 'ID';
    case Malaysia = 'MY';
    case Philippines = 'PH';
    case Singapore = 'SG';
    case HongKong = 'HK';
    case India = 'IN';

    // Caucasus & Central Asia
    case Georgia = 'GE';
    case Armenia = 'AM';
    case Kazakhstan = 'KZ';

    public function locales(): array
    {
        return match ($this) {
            self::Italy => ['it_IT'],

            self::Switzerland => [
                'it_CH',
                'de_CH',
                'fr_CH',
            ],

            self::UnitedKingdom,
            self::England,
            self::Scotland,
            self::Wales,
            self::Ireland,
            self::NorthernIreland => ['en_GB'],

            self::France => ['fr_FR'],
            self::Belgium => ['fr_BE', 'nl_BE'],
            self::Germany => ['de_DE'],
            self::Austria => ['de_AT'],
            self::Netherlands => ['nl_NL'],
            self::Portugal => ['pt_PT'],
            self::Spain => ['es_ES'],

            self::Denmark => ['da_DK'],
            self::Sweden => ['sv_SE'],
            self::Norway => ['nb_NO'],
            self::Finland => ['fi_FI'],
            self::Iceland => ['is_IS'],

            self::Poland => ['pl_PL'],
            self::CzechRepublic => ['cs_CZ'],
            self::Slovakia => ['sk_SK'],
            self::Hungary => ['hu_HU'],
            self::Slovenia => ['sl_SI'],
            self::Croatia => ['hr_HR'],
            self::Serbia => ['sr_RS'],
            self::Lithuania => ['lt_LT'],
            self::Latvia => ['lv_LV'],
            self::Estonia => ['et_EE'],
            self::Romania => ['ro_RO'],
            self::Moldova => ['ro_MD'],
            self::Bulgaria => ['bg_BG'],
            self::Ukraine => ['uk_UA'],
            self::Russia => ['ru_RU'],
            self::Greece => ['el_GR'],
            self::Turkey => ['tr_TR'],
            self::Montenegro => ['me_ME'],

            self::Brazil => ['pt_BR'],
            self::Argentina => ['es_AR'],
            self::Peru => ['es_PE'],
            self::Venezuela => ['es_VE'],

            self::UnitedStates => ['en_US'],
            self::Canada => ['en_CA', 'fr_CA'],
            self::Australia => ['en_AU'],
            self::NewZealand => ['en_NZ'],

            self::Nigeria => ['en_NG'],
            self::Uganda => ['en_UG'],
            self::Egypt => ['ar_EG'],

            self::Jordan => ['ar_JO'],
            self::SaudiArabia => ['ar_SA'],
            self::Iran => ['fa_IR'],
            self::Israel => ['he_IL'],

            self::Japan => ['ja_JP'],
            self::SouthKorea => ['ko_KR'],
            self::China => ['zh_CN'],
            self::Thailand => ['th_TH'],
            self::Vietnam => ['vi_VN'],
            self::Indonesia => ['id_ID'],
            self::Malaysia => ['ms_MY'],
            self::Philippines => ['en_PH'],
            self::Singapore => ['en_SG'],
            self::HongKong => ['en_HK'],
            self::India => ['en_IN'],

            self::Georgia => ['ka_GE'],
            self::Armenia => ['hy_AM'],
            self::Kazakhstan => ['kk_KZ'],
        };
    }

    public static function random(): Country
    {
        return self::cases()[array_rand(self::cases())];
    }
}
