<?php

namespace Database\Seeders;

use App\Models\Target;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    private array $_TARGETS = [
       'https://ria.ru/lenta/',
       'https://www.mos.ru/uslugi/',
       'http://www.tinkoff.ru/',
       'https://vsoloviev.ru/',
       'http://imctax.parus-s.ru/',
       'https://www.vtb.ru/',
       'http://www.cit-ufa.ru/',
       'https://proverki.gov.ru/',
       'http://www.belapb.by/',
       'http://rsbis.ru/elektronnaya-podpis/',
       'http://www.ucpir.ru/',
       'http://rusvesna.su/',
       'https://www.uralkali.com/ru/',
       'http://www.otchet-online.ru/',
       'http://mcspro.ru/',
       'https://magnit.ru/',
       'http://belres.by/',
       'http://www.rcarus.ru/',
       'https://lug-info.com/',
       'http://www.stv-it.ru/',
       'https://www.1tv.ru/',
       'https://sberbank.ru/',
       'http://www.center-inform.ru/',
       'https://dnr-news.com/',
       'https://obyasnyaem-prod.nationalpriority.ru/',
       'http://radiobrestfm.by/',
       'https://uc-osnovanie.ru/',
       'https://lenta.ru/',
       'http://www.kgb.by/',
       'https://www.kommersant.ru/',
       'https://smotrim.ru/',
       'https://mvd.gov.ru/',
       'https://stroi.gov.ru/',
       'http://www.kartoteka.ru/',
       'https://vgtrk.ru/',
       'https://api.sberbank.ru/prod/tokens/v2/oauth',
       'http://rts-tender.ru/',
       'http://dreamkas.ru/',
       'http://www.belnovosti.by/',
       'http://ont.by/',
       'https://iecp.ru/ep/uc-list/',
       'https://www.eurosib.ru/',
       'http://reform.by/',
       'https://cloud.rkn.gov.ru/',
       'http://belarus24.by/',
       'https://omk.ru/',
       'http://radiobelarus.by/',
       'http://bankdabrabyt.by/',
       'https://moslenta.ru/',
       'http://belkart.by/',
       'http://cfmc.ru/',
       'https://www.polymetalinternational.com/ru/',
       'https://kuban24.tv/',
       'http://www.icentr.ru/',
       'https://www.nornickel.com/',
       'https://www.gazprom.ru/',
       'http://structure.mil.ru/structure/uc/info.htm/',
       'https://mail.rkn.gov.ru/',
       'http://ca.kamgov.ru/',
       'http://udcs.ru/',
       'https://www.rbc.ru/',
       'http://www.slonves.by/',
       'http://www.24ecp.ru/',
       'https://er.ru/',
       'http://belinvestbank.by/',
       'http://www.gias.by/',
       'http://www.mvd.gov.by/',
       'https://tvzvezda.ru/',
       'https://www.gosuslugi.ru/',
       'http://www.icvibor.ru/',
       'http://www.nbrb.by/',
       'http://www.y-center.ru/',
       'http://izhtender.ru/',
       'http://ca.gisca.ru/',
       'http://gz.lot-online.ru/',
       'https://www.nalog.gov.ru/',
       'https://mil.ru/',
       'http://etp.roseltorg.ru/',
       'http://mascom-it.ru/',
       'http://www.e-portal.ru/',
       'http://minsknews.by/',
       'https://www.surgutneftegas.ru/',
       'https://pwd.wto.economy.gov.ru/',
       'http://government.ru/',
       'http://www.bellegprom.by/',
       'https://rkn.gov.ru/',
       'http://belarusbank.by/',
       'https://ya.ru/',
       'http://www.belneftekhim.by/',
       'http://qiwi.com/',
       'https://nangs.org/',
       'https://www.gazprombank.ru/',
       'http://www.nucrf.ru/',
       'https://yandex.ru/',
       'https://rzdlog.ru/',
       'http://etp-ets.ru/',
       'https://www.mk.ru/',
       'http://kremlin.ru/',
       'https://kk.bank/UdTs/',
       'https://www.gazeta.ru/',
       'https://sputnik.by/',
       'http://www.roseltorg.ru/',
       'https://iecp.ru/ep/ep-verification/',
       'http://zakazrf.ru/',
       'http://www.rsb.ru/',
       'http://elkursk.ru/',
       'https://www.severstal.com/',
       'http://bgp.by/',
       'https://www.evraz.com/ru/',
       'https://www.sibur.ru/',
       'https://tass.ru/',
       'http://grodnonews.by/',
       'http://www.astralnalog.ru/',
       'https://www.tmk-group.ru/',
       'https://online.sberbank.ru/',
       'http://butb.by/',
       'http://www.infotrust.ru/',
       'http://epnow.ru/',
       'http://www.mil.by/',
       'http://www.government.by/',
       'http://radiusfm.by/',
       'http://www.kt-69.ru/',
       'http://www.belinfonalog.ru/',
       'http://mironline.ru/',
       'https://www.tatneft.ru/',
       'https://sm.news/',
       'http://en.kremlin.ru/',
       'https://pfr.gov.ru/',
       'https://www.rzd.ru/',
       'http://3dsec.sberbank.ru/',
       'http://alfaradio.by/',
       'https://www.vedomosti.ru/',
       'https://riafan.ru/',
       'http://alfabank.ru/',
       'http://www.tvrmogilev.by/',
       'http://rbank.by/',
       'https://www.interfax.ru/',
       'http://www.prokuratura.gov.by/',
       'http://www.024.by/',
       'https://www.vesti.ru/',
       'https://rmk-group.ru/ru/',
       'https://zakupki.gov.ru/',
       'http://rk72.ru/',
       'https://nlmk.com/',
       'http://www.rncb.ru/',
       'http://tektorg.ru/',
       'http://zarya.by/',
       'https://ria.ru/',
       'http://brrb.by/',
       'http://sberbank-ast.ru/',
       'http://mininform.gov.by/',
       'http://radiostalica.by/',
       'http://www.crypset.ru/',
       'https://yandex.by/',
       'http://radiomir.by/',
       'https://lukoil.ru',
       'http://goszakupki.by/',
       'http://belmarket.by/',
       'http://ca.ntssoft.ru/',
       'http://www.ctv.by/',
       'http://squaretrade.ru/',
       'http://mogilevnews.by/',
       'https://api.sberbank.ru/prod/tokens/v2/oidc',
       'https://uc-osnovanie.ru//',
       'https://www.crimea.kp.ru/',
       'https://denmark.kdmid.ru/',
       'https://www.metalloinvest.com/',
       'http://www.vtb.by/',
       'http://yoomoney.ru/',
       'http://www.energo.by/',
       'http://zakupki.butb.by/',
       'http://www.nwudc.ru/',
       'http://ucestp.ru/',
       'http://kraskript.com/',
       'https://www.rt.com/',
       'http://yandex.by/',
       'http://etpgpb.ru/',
       'https://customs.gov.ru/',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (array_unique($this->_TARGETS) as $target) {
            Target::create(['url' => $target]);
        }
    }
}
