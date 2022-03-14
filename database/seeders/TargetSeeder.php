<?php

namespace Database\Seeders;

use App\Models\Target;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    private array $_TARGETS = [
        'https://ria.ru/lenta',
        'https://www.mos.ru/uslugi',
        'http://www.tinkoff.ru',
        'https://vsoloviev.ru',
        'http://imctax.parus-s.ru',
        'https://www.vtb.ru',
        'http://www.cit-ufa.ru',
        'https://proverki.gov.ru',
        'http://www.belapb.by',
        'http://rsbis.ru/elektronnaya-podpis',
        'http://www.ucpir.ru',
        'http://rusvesna.su',
        'https://www.uralkali.com/ru',
        'http://www.otchet-online.ru',
        'http://mcspro.ru',
        'https://magnit.ru',
        'http://belres.by',
        'http://www.rcarus.ru',
        'https://lug-info.com',
        'http://www.stv-it.ru',
        'https://www.1tv.ru',
        'https://sberbank.ru',
        'http://www.center-inform.ru',
        'https://dnr-news.com',
        'https://obyasnyaem-prod.nationalpriority.ru',
        'http://radiobrestfm.by',
        'https://uc-osnovanie.ru',
        'https://lenta.ru',
        'http://www.kgb.by',
        'https://www.kommersant.ru',
        'https://smotrim.ru',
        'https://mvd.gov.ru',
        'https://stroi.gov.ru',
        'http://www.kartoteka.ru',
        'https://vgtrk.ru',
        'https://api.sberbank.ru/prod/tokens/v2/oauth',
        'http://rts-tender.ru',
        'http://dreamkas.ru',
        'http://www.belnovosti.by',
        'http://ont.by',
        'https://iecp.ru/ep/uc-list',
        'https://www.eurosib.ru',
        'https://cloud.rkn.gov.ru',
        'http://belarus24.by',
        'https://omk.ru',
        'http://radiobelarus.by',
        'http://bankdabrabyt.by',
        'https://moslenta.ru',
        'http://belkart.by',
        'http://cfmc.ru',
        'https://www.polymetalinternational.com/ru',
        'https://kuban24.tv',
        'http://www.icentr.ru',
        'https://www.nornickel.com',
        'https://www.gazprom.ru',
        'http://structure.mil.ru/structure/uc/info.htm',
        'https://mail.rkn.gov.ru',
        'http://ca.kamgov.ru',
        'http://udcs.ru',
        'https://www.rbc.ru',
        'http://www.slonves.by',
        'http://www.24ecp.ru',
        'https://er.ru',
        'http://belinvestbank.by',
        'http://www.gias.by',
        'http://www.mvd.gov.by',
        'https://tvzvezda.ru',
        'https://www.gosuslugi.ru',
        'http://www.icvibor.ru',
        'http://www.nbrb.by',
        'http://www.y-center.ru',
        'http://izhtender.ru',
        'http://ca.gisca.ru',
        'http://gz.lot-online.ru',
        'https://www.nalog.gov.ru',
        'https://mil.ru',
        'http://etp.roseltorg.ru',
        'http://mascom-it.ru',
        'http://www.e-portal.ru',
        'http://minsknews.by',
        'https://www.surgutneftegas.ru',
        'https://pwd.wto.economy.gov.ru',
        'http://government.ru',
        'http://www.bellegprom.by',
        'https://rkn.gov.ru',
        'http://belarusbank.by',
        'https://ya.ru',
        'http://www.belneftekhim.by',
        'http://qiwi.com',
        'https://nangs.org',
        'https://www.gazprombank.ru',
        'http://www.nucrf.ru',
        'https://yandex.ru',
        'https://rzdlog.ru',
        'http://etp-ets.ru',
        'https://www.mk.ru',
        'http://kremlin.ru',
        'https://kk.bank/UdTs',
        'https://www.gazeta.ru',
        'https://sputnik.by',
        'http://www.roseltorg.ru',
        'https://iecp.ru/ep/ep-verification',
        'http://zakazrf.ru',
        'http://www.rsb.ru',
        'http://elkursk.ru',
        'https://www.severstal.com',
        'http://bgp.by',
        'https://www.evraz.com/ru',
        'https://www.sibur.ru',
        'https://tass.ru',
        'http://grodnonews.by',
        'http://www.astralnalog.ru',
        'https://www.tmk-group.ru',
        'https://online.sberbank.ru',
        'http://butb.by',
        'http://www.infotrust.ru',
        'http://epnow.ru',
        'http://www.mil.by',
        'http://www.government.by',
        'http://radiusfm.by',
        'http://www.kt-69.ru',
        'http://www.belinfonalog.ru',
        'http://mironline.ru',
        'https://www.tatneft.ru',
        'https://sm.news',
        'http://en.kremlin.ru',
        'https://pfr.gov.ru',
        'https://www.rzd.ru',
        'http://3dsec.sberbank.ru',
        'http://alfaradio.by',
        'https://www.vedomosti.ru',
        'https://riafan.ru',
        'http://alfabank.ru',
        'http://www.tvrmogilev.by',
        'http://rbank.by',
        'https://www.interfax.ru',
        'http://www.prokuratura.gov.by',
        'http://www.024.by',
        'https://www.vesti.ru',
        'https://rmk-group.ru/ru',
        'https://zakupki.gov.ru',
        'http://rk72.ru',
        'https://nlmk.com',
        'http://www.rncb.ru',
        'http://tektorg.ru',
        'http://zarya.by',
        'https://ria.ru',
        'http://brrb.by',
        'http://sberbank-ast.ru',
        'http://mininform.gov.by',
        'http://radiostalica.by',
        'http://www.crypset.ru',
        'https://yandex.by',
        'http://radiomir.by',
        'https://lukoil.ru',
        'http://goszakupki.by',
        'http://belmarket.by',
        'http://ca.ntssoft.ru',
        'http://www.ctv.by',
        'http://squaretrade.ru',
        'http://mogilevnews.by',
        'https://api.sberbank.ru/prod/tokens/v2/oidc',
        'https://www.crimea.kp.ru',
        'https://denmark.kdmid.ru',
        'https://www.metalloinvest.com',
        'http://www.vtb.by',
        'http://yoomoney.ru',
        'http://www.energo.by',
        'http://zakupki.butb.by',
        'http://www.nwudc.ru',
        'http://ucestp.ru',
        'http://kraskript.com',
        'https://www.rt.com',
        'http://yandex.by',
        'http://etpgpb.ru',
        'https://customs.gov.ru',
        'http://fsb.ru',
        'http://regions.ru',
        'https://uralpress.ru',
        'https://www.mn.ru',
        'https://wek.ru',
        'https://free-news.su',
        'https://www.trud.ru',
        'https://sobesednik.ru',
        'https://newsland.com',
        'https://www.ng.ru',
        'https://www.bfm.ru',
        'https://topwar.ru',
        'https://ddos-guard.net/ru',
        'https://stormwall.pro',
        'https://qrator.net/ru',
        'https://solidwall.ru',
        'https://crimea-news.com',
        'https://sevastopol.su',
        'https://vesti-k.ru',
        'https://www.sobyanin.ru',
        'http://wikimapia.org',
        'http://sber.ru',
        'http://185.157.96.130',
        'http://profile.sber.ru',
        'http://84.252.144.102',
        'http://www.sima-land.ru',
        'https://rzd.ru',
        'https://poezd.ru',
        'https://zd-bileti.ru',
        'https://ru.myfin.by/banki',
        'https://www.vbr.ru/banki/catalog',
        'https://www.жд-билеты.сайт',
        'https://travel.yandex.ru/жд/билеты',
        'https://www.onetwotrip.com/ржд-билеты/онлайн',
        'https://rasp.yandex.ru',
        'https://www.ufs-online.ru',
        'https://bilet.aero',
        'https://www.ozon.ru',
        'https://tickets.by',
        'https://poezda.biletyplus.ru',
        'https://pzd-online.ru',
        'https://poezd-moskva.su',
        'https://www.tutu.travel',
        'https://zhd.online',
        'https://www.expresstorussia.com',
        'https://1poezd.ru',
        'https://www.едем.рф',
        'https://www.flydex.ru',
        'http://www.rupoezd.ru',
        'https://movens.ru',
        'https://zhdbilet.com',
        'http://www.poezdbilet.ru',
        'https://loukoster.com',
        'https://www.poezd.ru',
        'https://zhd-moskva.ru',
        'https://poezdato.net',
        'http://www.absolutbank.ru',
        'http://www.aversbank.ru',
        'http://www.avtogradbank.ru',
        'http://www.autokreditbank.ru',
        'http://www.7305115.ru',
        'http://www.apkbank.ru',
        'http://www.agroros.ru',
        'http://www.atb.su',
        'http://www.ai-bank.ru',
        'http://www.icbcmoscow.ru',
        'http://www.akbars.ru',
        'http://www.akibank.ru',
        'http://www.acropol.ru',
        'http://www.aktivbank.ru',
        'http://www.alexbank.ru',
        'http://www.alefbank.ru',
        'http://www.albank.ru',
        'http://www.capitalbank.ru',
        'http://www.altynbank.com',
        'http://www.alal.ru',
        'http://www.altbank.ru',
        'http://www.alfafuture.ru',
        'http://www.apabank.ru',
        'http://www.aresbank.ru',
        'http://www.bank-arzamas.ru',
        'http://www.baikalinvestbank.ru',
        'http://www.baikalcredobank.ru',
        'http://www.balakovo-bank.ru',
        'http://www.baltinvest.ru',
        'http://www.131.ru',
        'http://www.kbagora.ru',
        'http://www.akcept.ru',
        'http://www.ipoteka-tut.ru',
        'http://www.cfb.ru',
        'http://www.рк-банк.рф',
        'http://www.bancaintesa.ru',
        'http://www.bankofkazan.ru',
        'http://www.bank-credit-suisse-moscow.ru',
        'http://www.nbsrf.ru',
        'http://www.bankorange.ru',
        'http://www.orbank.ru',
        'http://www.bankpsafinance.ru',
        'http://www.bankrmp.ru',
        'http://www.bankrsi.ru',
        'http://www.bankrealist.ru',
        'http://www.sksbank.ru',
        'http://www.bbr.ru',
        'http://www.belsocbank.ru',
        'http://www.bereit.ru',
        'http://www.besteffortsbank.ru',
        'http://www.bstbank.ru',
        'http://www.bm-bank.ru',
        'http://www.bnpparibasbank.ru',
        'http://www.ankb.ru',
        'http://www.bystrobank.ru',
        'http://www.boc.ru',
        'http://www.вакобанк.рф',
        'http://www.vlb100.ru',
        'http://www.venets-bank.ru',
        'http://www.ibv.ru',
        'http://www.vikingbank.ru',
        'http://www.vitabank.ru',
        'http://www.vcabank.ru',
        'http://www.vlbb.ru',
        'http://www.vfbank.ru',
        'http://www.vbank.ru',
        'http://www.bankvl.ru',
        'http://www.vostbank.ru',
        'http://www.vrbmoscow.ru',
        'http://www.vbrr.ru',
        'http://www.olb.ru',
        'http://www.vuzbank.ru',
        'http://www.vyatich.ryazan.ru',
        'http://www.gazneftbank.ru',
        'http://www.gpb.ru',
        'http://www.gaztransbank.ru',
        'http://www.gibank.ru',
        'http://www.genbank.ru',
        'http://www.geobank.ru',
        'http://www.bankgefest.ru',
        'http://www.bankglobus.ru',
        'http://www.goldmansachsbank.ru',
        'http://www.gorbank.spb.ru',
        'http://www.gutabank.ru',
        'http://www.dvbank.ru',
        'http://www.izhcombank.ru',
        'http://www.denizbank.ru',
        'http://www.derzhava.ru',
        'http://www.jpmorgan.ru',
        'http://www.jtbank.ru',
        'http://www.deutschebank.ru',
        'http://www.bankdolinsk.ru',
        'http://www.dombank.ru',
        'http://www.doncombank.ru',
        'http://www.donteksbank.ru',
        'http://www.bankd.ru',
        'http://www.eurasian-bank.ru',
        'http://www.eab.ru',
        'http://www.eatpbank.ru',
        'http://www.euroalliance.ru',
        'http://www.evrofinance.ru',
        'http://www.emb.ru',
        'http://www.united.ru',
        'http://www.bankermak.ru',
        'http://www.zhivagobank.ru',
        'http://www.zapsibkombank.ru',
        'http://www.zarech.ru',
        'http://www.sauberbank.com',
        'http://www.zemcombank.ru',
        'http://www.zemsky.ru',
        'http://www.kombank.ru',
        'http://www.bankzenitsochi.ru',
        'http://www.ziraatbank.ru',
        'http://www.icbru.ru',
        'http://www.ikanobank.ru',
        'http://www.in-bank.ru',
        'http://www.itb.ru',
        'http://www.ing.ru',
        'http://www.isbank.ru',
        'http://www.itbank.ru',
        'http://www.ipb.ru',
        'http://www.interprombank.ru',
        'http://www.bankirs.ru',
        'http://www.iturupbank.ru',
        'http://www.isbank.com.ru',
        'http://www.olabank.ru',
        'http://www.bankkaluga.ru',
        'http://www.kamkombank.ru',
        'http://www.capital-bank.ru',
        'http://www.bank-45.ru',
        'http://www.rapida.ru',
        'http://www.akbkeb.ru',
        'http://www.koltso.ural.ru',
        'http://www.commerzbank.ru',
        'http://www.cibl.ru',
        'http://www.kkb.ru',
        'http://www.bankkontinental.ru',
        'http://www.bcosm.ru',
        'http://www.selkombank.ru',
        'http://www.ca-cib.ru',
        'http://www.cardcredit.ru',
        'http://www.creditural.ru',
        'http://www.kremlinbank.ru',
        'http://www.crocusbank.ru',
        'http://www.krona-bank.ru',
        'http://www.crosnabank.ru',
        'http://www.ks-bank.ru',
        'http://www.kubankredit.ru',
        'http://www.bktb.ru',
        'http://www.kuzbasshimbank.ru',
        'http://www.kbb.ru',
        'http://www.kuzbank.ru',
        'http://www.kmbank.ru',
        'http://www.bank45.ru',
        'http://www.kurskprombank.ru',
        'http://www.kebrus.ru',
        'http://www.lanta24.ru',
        'http://www.nskbl.ru',
        'http://www.maykopbank.ru',
        'http://www.bank-mayskiy.ru',
        'http://www.bankmaxima.ru',
        'http://www.ibam.ru',
        'http://www.mvs-bank.ru',
        'http://www.megapolice.ru',
        'http://www.mcombank.ru',
        'http://www.mfk-bank.ru',
        'http://www.mpsb.ru',
        'http://www.mbbr.ru',
        'http://www.metallinvestbank.ru',
        'http://www.metallurgbank.ru',
        'http://www.metcom.ru',
        'http://www.mizuhobank.com/russia/ru',
        'http://www.mbbru.ru',
        'http://www.modulbank.ru',
        'http://www.morganstanley.ru',
        'http://www.morbank.ru',
        'http://www.mcbank.ru',
        'http://www.minbank.ru',
        'http://www.moscombank.ru',
        'http://www.mnhb.ru',
        'http://www.mosoblbank.ru',
        'http://www.mia.ru',
        'http://www.moskb.ru',
        'http://www.mcbankrus.ru',
        'http://www.mti-bank.ru',
        'http://www.mtsbank.ru',
        'http://www.profitbank.ru',
        'http://www.bank-mscb.ru',
        'http://www.bnal.ru',
        'http://www/nb-bank.ru',
        'http://www.ndb24.ru',
        'http://www.nib-samara.ru',
        'http://www.ru.natixis.com',
        'http://www.nipbank.ru',
        'http://www.factoring.ru',
        'http://www.ncc-qccp.ru',
        'http://www.nrb.ru',
        'http://www.rsbank.ru',
        'http://www.nbdbank.ru',
        'http://www.ncibank.ru',
        'http://www.bankneyva.ru',
        'http://www.nkbank.ru',
        'http://www.novikom.ru',
        'http://www.novobank.ru',
        'http://www.novokib.ru',
        'http://www.newbank.ru',
        'http://www.nmbank.ru',
        'http://noosferabank.ru',
        'http://новогодний.норвикбанк.рф',
        'http://www.new.nsbank.ru',
        'http://www.obr1016.ru',
        'http://www.okbank.ru',
        'http://www.aorb.ru',
        'http://www.onegobank.ru',
        'http://www.oneybank.ru',
        'http://www.orgbank.ru',
        'http://www.otpbank.ru',
        'http://www.zen.yandex.ru',
        'http://www.finbank.ru',
        'http://www.1cb.ru',
        'http://www.bank-peresvet.ru',
        'http://www.pscb.ru',
        'http://www.platina.ru',
        'http://www.plus-bank.ru',
        'http://www.ok.ru/pochtabank',
        'http://www.uralexpress.ru',
        'http://www.primbank.ru',
        'http://www.ptkb.ru',
        'http://www.priobye.ru',
        'http://www.probank.pro',
        'http://www.pibank.ru',
        'http://www.procombank.ru',
        'http://pib.ru',
        'http://www.psbinvest.ru',
        'http://www.pshb.ru',
        'http://www.promtransbank.ru',
        'http://www.prbkbr.ru',
        'http://www.dcapital.ru',
        'http://www.raiffeisen.ru',
        'http://www.round.ru',
        'http://www.rbabank.ru',
        'http://www.rencredit.ru',
        'http://www.rentabank.ru',
        'http://www.resocreditbank.ru',
        'http://www.cbrca.ru',
        'http://www.restrust.ru',
        'http://rn-bank.ru',
        'http://www.custody.ru',
        'http://www.rbb.ru',
        'http://www.rgsbank.ru',
        'http://www.rdb.ru',
        'http://роскосмосбанк.рус',
        'http://www.rusfincorp.ru',
        'http://www.russitabank.ru',
        'http://www.abr.ru',
        'http://www.rostfinance.ru',
        'http://www.eximbank.ru',
        'http://www.royal-bank.ru',
        'http://www.runabank.ru',
        'http://www.rusnarbank.ru',
        'http://www.rusbsbank.ru',
        'http://www.acquiring.ru',
        'http://www.rusfinance.ru',
        'http://www.rrb.ru',
        'http://www.rubank.ru',
        'http://rfibank.ru',
        'http://www.kbsammit.ru',
        'http://www.bspb.ru',
        'http://sbionline.ru',
        'http://www.banksaratov.ru',
        'http://www.sbbank.ru',
        'http://www.pokupay.ru',
        'http://www.sviaz-bank.ru',
        'http://www.sdm.ru',
        'http://www.morskoybank.com',
        'http://www.sevnb.ru',
        'http://www.severstroybank35.ru',
        'http://www.nwipbank.ru',
        'http://www.selmashbank.ru',
        'http://stm.srbank.ru',
        'http://www.cetelem.ru',
        'http://www.banki.ru/banks/bank/siab',
        'http://www.sibsoc.ru',
        'http://www.sinergy.ru',
        'http://www.sinko-bank.ru',
        'http://www.sistemabank.ru',
        'http://www.cibank.ru',
        'http://www.citibank.ru',
        'http://www.slavbank.ru',
        'http://www.slavcred.ru',
        'http://smpbank.ru',
        'http://www.snbank.ru',
        'http://www.sobinbank.ru',
        'http://www.rosevrobank.ru',
        'http://www.sstb-bank.ru',
        'http://www.sbnk.ru',
        'http://solidbank.ru',
        'http://socium-bank.ru',
        'http://www.banksoyuz.ru',
        'http://www.ssb.msk.ru',
        'http://www.spiritbank.ru',
        'http://www.banksputnik.ru',
        'http://www.psbst.ru',
        'http://www.stkbank.ru',
        'http://www.bankck.ru',
        'http://www.slbank.ru',
        'http://smbcr-bank.ru',
        'http://www.sngb.ru',
        'http://www.peb.ru',
        'http://www.tavrich.ru',
        'http://www.tagbank.ru',
        'http://www.taidon.ru',
        'http://www.tkpb.ru',
        'http://tatsotsbank.ru',
        'http://www.tender-bank.ru',
        'http://www.timerbank.ru',
        'http://www.kupivkredit.ru',
        'http://www.thbank.ru',
        'http://www.tpsbank.tomsk.ru',
        'http://kb-tub.ru',
        'http://www.tkbbank.ru',
        'http://www.transstroibank.ru',
        'http://www.rostbank.ru',
        'http://tembr.ru',
        'http://www.nerungribank.ru',
        'http://www.ufb.ru',
        'http://www.uralprombank.ru',
        'http://www.bankuralsib.ru',
        'http://www.uralfinance.ru',
        'http://www.odnoklassniki.ru',
        'http://www.klookva.ru',
        'http://woori.ru',
        'http://www.finambank.ru',
        'http://www.fbbank.ru',
        'http://www.finsb.ru',
        'http://bank.vwfs.ru',
        'http://www.forabank.ru',
        'http://www.forbank.ru',
        'http://forshtadt.ru',
        'http://bankffin.ru',
        'http://kbhmb.ru',
        'http://www.bankhimik.ru',
        'http://rnko-kholmsk.ru',
        'http://www.kbca.ru',
        'http://www.centrinvest.ru',
        'http://www.ccb.ru',
        'http://ru.ccb.com',
        'http://www.ru.abchina.com',
        'http://www.biz-autocredit.chelind.ru',
        'http://www.chelinvest.ru',
        'http://www.chbrr.crimea.com',
        'http://www.hsbc.ru',
        'http://www.eco-invest.ru',
        'http://econombank.ru',
        'http://www.exibank.ru',
        'http://www.expobank.ru',
        'http://www.volgaex.ru',
        'http://www.bankelita.ru',
        'http://www.bk.mufg.jp/ao/index.html',
        'http://energobank.ru',
        'http://www.energotransbank.com',
        'http://www.ooo-ubs-bank.com',
        'http://www.invb.ru',
        'http://ymkbank.ru',
        'http://www.imb.ru',
        'http://www.unistream.ru',
        'http://www.yarinterbank.ru',
        'https://mostransavto.ru',
        'https://bus.biletyplus.ru',
        'https://busfor.ru',
        'https://buybusticket.ru',
        'https://rasp.yandex.ru',
        'https://travelask.ru',
        'https://avtobus.flydex.ru',
        'https://bus.tutu.ru',
        'https://www.busradar.ru',
        'https://www.ozon.ru',
        'https://carpool.star-bus.ru',
        'https://myroutes.ru',
        'https://moskva-avtobus.ru',
        'https://movens.ru',
        'https://bilet.aero',
        'https://tickets.by',
        'https://avtobus-raspisanie.ru',
        'https://jdbilet.ru',
        'https://azlog.ru',
        'https://www.avito.ru',
        'https://uniticket.by',
        'https://www.s7.ru',
        'https://ekaterinburg.avtobus1.ru',
        'https://www.aeroflot.ru',
        'https://pass.rw.by',
        'https://www.tutu.ru',
        'https://t.rasp.yandex.ru',
        'https://transport.marshruty.ru',
        'https://zd-bileti.ru',
        'http://my.bank-hlynov.ru',
        'http://link.centrinvest.ru',
        'http://enter.unicredit.ru',
        'https://xaknet.team/img/logo.png',
        'http://sb.by',
        'https://www.km.ru',
        'https://www.astrobl.ru',
        'https://www.volgograd.ru',
        'https://www.admoblkaluga.ru',
        'https://apparat.lenobl.ru',
        'https://mosreg.ru',
        'https://orel-region.ru',
        'http://midural.ru',
        'http://www.tula.ru',
        'https://ulgov.ru',
        'https://cheladmin.ru',
        'https://krd.ru',
        'https://www.stavregion.ru',
        'https://sberfn.ru',
        'https://sber-am.ru',
        'https://www.vtbcapital-pr.ru',
        'https://region-am.ru',
        'https://www.ingosinvest.ru',
        'https://goszakaz.ru',
        'https://star-pro.ru',
        'http://ati.su',
        'https://region.ru',
        'https://monopoly.ru',
        'https://ul.su/',
        'http://gruzovozkin.pro',
        'https://www.fl.ru',
        'https://advego.com',
        'https://kwork.ru',
        'http://freelance.ru',
        'http://freelansim.ru',
        'https://work-zilla.com',
        'http://www.patriarchia.ru',
        'https://www.pravmir.ru',
        'http://pravoslavie.ru',
        'http://acs.vendorcert.mirconnect.ru',
        'http://ds1.mirconnect.ru',
        'http://ds2.mirconnect.ru',
        'http://uat-ds1.mirconnect.ru',
        'http://uat-ds2.mirconnect.ru',
        'https://eadaily.com/ru',
        'https://norussians.xyz',
        'https://stopnazi.xyz',
        'https://www.russianhighways.ru',
        'https://www.nlmk.com',
        'https://gtrklnr.com',
        'https://tr.sputniknews.com',
        'https://www.aydinlik.com.tr',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (array_unique($this->_TARGETS) as $target) {
            if (!Target::where('url', '=', $target)->exists()) {
                Target::create(['url' => $target]);
            }
        }
    }
}
