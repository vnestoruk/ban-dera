<?php

namespace Database\Seeders;

use App\Models\Target;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    private array $_TARGETS = [
        ['title' => 'Gazprom', 'url' => 'https://www.gazprom.ru/'],
        ['title' => 'Lukoil', 'url' => 'https://lukoil.ru'],
        ['title' => 'Magnet', 'url' => 'https://magnit.ru/'],
        ['title' => 'Norilsk Nickel', 'url' => 'https://www.nornickel.com/'],
        ['title' => 'Surgetneftegas', 'url' => 'https://www.surgutneftegas.ru/'],
        ['title' => 'Tatneft', 'url' => 'https://www.tatneft.ru/'],
        ['title' => 'Evraz', 'url' => 'https://www.evraz.com/ru/'],
        ['title' => 'NLMK', 'url' => 'https://nlmk.com/'],
        ['title' => 'Sibur Holing', 'url' => 'https://www.sibur.ru/'],
        ['title' => 'Severstal', 'url' => 'https://www.severstal.com/'],
        ['title' => 'Metalloinvest', 'url' => 'https://www.metalloinvest.com/'],
        ['title' => 'NNC', 'url' => 'https://nangs.org/'],
        ['title' => 'Russian Copper Company', 'url' => 'https://rmk-group.ru/ru/'],
        ['title' => 'TMK', 'url' => 'https://www.tmk-group.ru/'],
        ['title' => 'Yandex', 'url' => 'https://ya.ru/'],
        ['title' => 'Polymetal International', 'url' => 'https://www.polymetalinternational.com/ru/'],
        ['title' => 'Uralkali', 'url' => 'https://www.uralkali.com/ru/'],
        ['title' => 'Eurosibenergo', 'url' => 'https://www.eurosib.ru/'],
        ['title' => 'OMK', 'url' => 'https://omk.ru/'],
        ['title' => 'Lenta', 'url' => 'https://lenta.ru/'],
        ['title' => 'Ria', 'url' => 'https://ria.ru/'],
        ['title' => 'Ria Lenta', 'url' => 'https://ria.ru/lenta/'],
        ['title' => 'RBC', 'url' => 'https://www.rbc.ru/'],
        ['title' => 'Russia Today', 'url' => 'https://www.rt.com/'],
        ['title' => 'Kremlin', 'url' => 'http://kremlin.ru/'],
        ['title' => 'Kremlin (en)', 'url' => 'http://en.kremlin.ru/'],
        ['title' => 'Smotrim.ru', 'url' => 'https://smotrim.ru/'],
        ['title' => 'TASS', 'url' => 'https://tass.ru/'],
        ['title' => 'TV zvezda', 'url' => 'https://tvzvezda.ru/'],
        ['title' => 'Soloviev', 'url' => 'https://vsoloviev.ru/'],
        ['title' => '1 TV', 'url' => 'https://www.1tv.ru/'],
        ['title' => 'Vesti', 'url' => 'https://www.vesti.ru/'],
        ['title' => 'Sberbank (online)', 'url' => 'https://online.sberbank.ru/'],
        ['title' => 'sberbank', 'url' => 'https://sberbank.ru/'],
        ['title' => 'Zakupki', 'url' => 'https://zakupki.gov.ru/'],
        ['title' => 'Gosuslugi', 'url' => 'https://www.gosuslugi.ru/'],
        ['title' => 'ER', 'url' => 'https://er.ru/'],
        ['title' => 'RZD', 'url' => 'https://www.rzd.ru/'],
        ['title' => 'RZDlog', 'url' => 'https://rzdlog.ru/'],
        ['title' => 'VGTRK', 'url' => 'https://vgtrk.ru/'],
        ['title' => 'Interfax', 'url' => 'https://www.interfax.ru/'],
        ['title' => 'MOS', 'url' => 'https://www.mos.ru/uslugi/'],
        ['title' => 'Government', 'url' => 'http://government.ru/'],
        ['title' => 'Mil', 'url' => 'https://mil.ru/'],
        ['title' => 'Nalog', 'url' => 'https://www.nalog.gov.ru/'],
        ['title' => 'Customs', 'url' => 'https://customs.gov.ru/'],
        ['title' => 'PFR', 'url' => 'https://pfr.gov.ru/'],
        ['title' => 'RosKomNadzor', 'url' => 'https://rkn.gov.ru/'],
        ['title' => 'Gazprom Bank', 'url' => 'https://www.gazprombank.ru/'],
        ['title' => 'VTB', 'url' => 'https://www.vtb.ru/'],
        ['title' => 'Yandex (ru)', 'url' => 'https://yandex.ru/'],
        ['title' => 'Yandex (by)', 'url' => 'https://yandex.by/'],
        ['title' => 'RosKomNadzor (mail server)', 'url' => 'https://mail.rkn.gov.ru/'],
        ['title' => 'RosKomNadzor (cloud server)', 'url' => 'https://cloud.rkn.gov.ru/'],
        ['title' => 'MVD', 'url' => 'https://mvd.gov.ru/'],
        ['title' => 'Economy', 'url' => 'https://pwd.wto.economy.gov.ru/'],
        ['title' => 'Stroi', 'url' => 'https://stroi.gov.ru/'],
        ['title' => '', 'url' => 'https://proverki.gov.ru/'],
        ['title' => '', 'url' => 'https://www.gazeta.ru/'],
        ['title' => '', 'url' => 'https://www.crimea.kp.ru/'],
        ['title' => '', 'url' => 'https://www.kommersant.ru/'],
        ['title' => '', 'url' => 'https://riafan.ru/'],
        ['title' => '', 'url' => 'https://www.mk.ru/'],
        ['title' => '', 'url' => 'https://api.sberbank.ru/prod/tokens/v2/oauth'],
        ['title' => '', 'url' => 'https://api.sberbank.ru/prod/tokens/v2/oidc'],
        ['title' => '', 'url' => 'https://www.vedomosti.ru/'],
        ['title' => '', 'url' => 'https://sputnik.by/'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->_TARGETS as $target) {
            Target::create($target);
        }
    }
}
