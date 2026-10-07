<?php

namespace App\Enums;

use Illuminate\Support\Str;

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

    // United Kingdom & Ireland
    case England = 'GB_ENG';
    case Scotland = 'GB_SCT';
    case Wales = 'GB_WLS';
    case NorthernIreland = 'GB_NIR';
    case Ireland = 'IE';

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
    case Albania = 'AL';

    // South America
    case Brazil = 'BR';
    case Argentina = 'AR';
    case Peru = 'PE';
    case Venezuela = 'VE';
    case Mexico = 'MX';
    case Colombia = 'CO';
    case Uruguay = 'UY';
    case Ecuador = 'EC';
    case Chile = 'CL';

    // North America & Oceania
    case UnitedStates = 'US';
    case Canada = 'CA';
    case Australia = 'AU';
    case NewZealand = 'NZ';

    // Africa
    case Nigeria = 'NG';
    case Congo = 'CD';
    case Uganda = 'UG';
    case Egypt = 'EG';
    case Ghana = 'GH';
    case IvoryCoast = 'CI';
    case Cameroon = 'CM';
    case Senegal = 'SN';
    case Morocco = 'MA';
    case Algeria = 'DZ';
    case Zambia = 'ZM';
    case SierraLeone = 'SL';
    case SouthAfrica = 'ZA';
    case Tunisia = 'TN';
    case Mali = 'ML';

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

            self::England => ['en_GB'],
            self::Wales => ['en_WLS'],
            self::Ireland => ['en_IE'],
            self::Scotland => ['en_SCT'],
            self::NorthernIreland => ['en_NIR'],

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
            self::Albania => ['sq_AL'],

            self::Brazil => ['pt_BR'],
            self::Argentina => ['es_AR'],
            self::Peru => ['es_PE'],
            self::Venezuela => ['es_VE'],
            self::Mexico => ['es_MX'],
            self::Colombia => ['es_CO'],
            self::Uruguay => ['es_UY'],
            self::Ecuador => ['es_EC'],
            self::Chile => ['es_CL'],

            self::UnitedStates => ['en_US'],
            self::Canada => ['en_CA', 'fr_CA'],
            self::Australia => ['en_AU'],
            self::NewZealand => ['en_NZ'],

            self::Nigeria => ['en_NG'],
            self::Congo => ['fr_CD'],
            self::Uganda => ['en_UG'],
            self::Ghana => ['en_GH'],
            self::Egypt => ['ar_EG'],
            self::IvoryCoast => ['fr_CI'],
            self::Cameroon => ['fr_CM'],
            self::Senegal => ['fr_SN'],
            self::Morocco => ['fr_MA'],
            self::Mali => ['fr_ML'],
            self::Algeria => ['fr_DZ'],
            self::Zambia => ['en_ZM'],
            self::SierraLeone => ['en_SL'],
            self::SouthAfrica => ['en_ZA'],
            self::Tunisia => ['fr_TN'],

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

            default => [config('app.locale')],
        };
    }

    public function name(): string
    {
        return Str::headline($this->name);
    }

    public static function random(): Country
    {
        return self::cases()[array_rand(self::cases())];
    }
}