<?php
//посылаем загововки
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//начало страницы
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta 
http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем конфигурационный файл
include "./ini.php";
//продолжаем вывод в браузер
print '<card title="'.$lang['help'].'">'.
'<p>';
//авторизируемся
$login = autorize();
if($login) {//автризация выполнена
	switch($mod) {
	//режим правил
	case 'rules':
	print '
	
	
	<b>1. Zabranjeno je</b>
	<br/>
	<br/>
<b>1.1.</b> Zabranjeno je napadati ili vredjati clanove chata po nacionalnom, verskom, geografskom, rasnom ili nekom drugom osnovu.
<br/>
<br/>
<b>1.2.</b> Zabranjeno je isticati nacionalnu, versku, geografsku ili rasnu pripadnost, materijalno stanje i sli�no, kako svoje tako i drugih clanova, ukoliko to tema iskljucivo ne zahteva i ako se ne kosi sa predhodnim clanom.
<br/>
<br/>
<b>1.3.</b> Zabranjene su diskusije o politici.
<br/>
<br/>
<b>1.4.</b> Zabranjene su eksplicitne teme o seksu. Osim u sobi predvidjenoj za to
<br/>
<br/>
<b>1.5.</b> Zabranjeno je postavljati poruke koje sadrze li�ne podatke clanova ili bilo kojih drugih osoba, kao sto su brojevi telefona i slicno.
<br/>
<br/>
<b>1.6.</b> Zabranjeno je otkrivati identitet clanova.
<br/>
<br/>
<b>1.7.</b> Zabranjeno je postavljati javno privatne poruke drugih clanova bez dozvole autora te privatne poruke.
<br/>
<br/>
<b>1.8.</b> Zabranjeno je postavljati poruke kojima krsite necija zakonska, patentna, autorska ili druga prava.
<br/>
<br/>
<b>1.9.</b> Zabranjena je bilo kakva zloupotreba chata ili clanova.
<br/>
Prijavljivanje i ucestvovanje na forumu sa iskljucivim ciljem promocije vaseg sajta ili posla je zabranjeno. Sve slicne poruke bice obrisane. Zabranjeno je slanje privatnih poruka clanoviama radi reklamiranja drugih sajtova ili chatova. Clanovi koje dobiju privatne poruke reklamne prirode, mogu se obratiti uredniku. Zabranjeno je anketiranje clanova za potrebe vasih istrazivanja ili posla kojim se bavite.
<br/>
<br/>
<b>1.10.</b> Nemojte davati svoje korisnicko ime i sifru na koris�enje nekom drugom.
<br/>
Svako je slobodan da se registruje kao chater i moze to svoje pravo da iskoristi.
<br/>
<br/>
<b>1.11.</b> Nemojte koristiti vulgarno izrazavanje.
<br/>
Ukoliko kontekst poruke zahteva pisanje ruznih reci (vicevi ili slicno), deo reci zamenite zvezdicama. Pazite na broj smajlija koje koristite, strogo je zabranjeno u jednoj poruci poslati vise od 3 smajlija!
<br/>
<br/>
<b>1.12.</b> Nemojte ulaziti u diskusije sa administratorom i urednicima o gore postavljenim tackama.
<br/>
Administrator i urednici imaju ekskluzivno pravo da uredjuju chat prema sopstvenom nahodjenju i slobodnoj proceni i nisu duzni davati objasnjenja niti pravdati svoje akcije i postupke.
<br/><br/>

<b>2. Sankcije</b><br/>
<br/>
<b>2.1.</b> Ukoliko se neki clan ponasa u suprotnosti sa ovim pravilima i greske uporno ponavlja i posle vise upozorenja da to ne �ini, bi�e mu zabranjen pristup chatu.<br/>
Zabrana pristupa chatu je zaista krajnja mera, kada vise nista ne moze da pomogne. <br/>Administrator i Urednici zadrzavaju pravo da primene ovu meru odmah ukoliko se neki clan ponasa krajnje nedoli�no.<br/><br/>


<b>3. Specijalno</b><br/>
<br/>
<b>3.1.</b>	Budite uzoran clan Srb W@P Chata, u korektnim odnosima sa ostalim clanovima i tako postanite urednik ovog chata! Urednike odredjuje administracija Srb W@P chata, na osnovu broja postova, ponasanja na chatu i pomaganju novajlijama da se uklope. Svaki Urednik moze da postane Super Urednik<br/><br/> 



<b>Zelimo vam prijatan boravak na chatu.</b><br/><br/>

';

	break;
	//режим buyjh
	case 'ignor':
	print 'Vazno je da znate ako vas neko uznemirava ili flud pravi po chatu,da jednostavnim klikom na njegov nick a zatim ignor,otarasite se tog nicka i vise ga uopste ne vidite! A kada ga vracate samo opet kliknete na taj nick u ignor listi.<br/> <br/> 
	';
	break;
	// pravila za modere
	case 'modrules':
	print '<b>Pravilnik Rada Urednika:</b><br/><br/>
<b>1.</b> Osobe koje imaju status Urednika, duzni su da svojim prisustvom odrzavaju red i mir na kanalu. Urednik na chatu, duzan je da obavlja posao objektivno, stoga ne sme biti naklonjen nijednoj strani u pogledu navijanja, politickog opredeljenja, verskog opredeljenja, etnickog i tako dalje. Urednik SRB W@P Chata mora svoj posao obavljati savesno i mora biti uzor drugim korisnicima.Sva pravila koja moraju da postuju korisnici, takodje se odnose i na Urednike.<br/>
<b>2.</b> Ukoliko Urednik mora da odsustvuje sa chata duzi period vremena koji iznosi od nedelju dana (7 dana) pa nadalje, mora se obratiti Administratoru kao i ostalim Urednicima.U slucaju da se Urednik NE javi, a odsustvuje vise od DVE nedelje, rizikuje da izgubi trenutni status.<br/>

<b>3.</b> Svadja ili rasprava, razmirica, medju Urednicima mora biti obavljena ili privatno, bez prisustva korisnika koji bi, u tom slucaju, morali da posmatraju to. Cak i tada se preporucuje mirno razresenje problema, radije nego otvorena svadja izmedju dva Urednika. Ukoliko se, medjutim, svadja ili rasprava izmedju dvojice Urednika pogorsa, tada se rizikuje gubljenje samog statusa Urednika koji je zapoceo svadju. Diskriminacija medju Urednicima je zabranjena.<br/>
<b>4.</b> Pozeljno je izbegavati medjusobno izbacivanje Urednika sa kanala.<br/>
<b>5.</b> Koriscenje statusa Urednika u licne svrhe tj. njegovo iskoristavanje u nedozvoljene svrhe i zloupotrebe, je strogo zabranjeno.U to se ubraja izbacivanje korisnika sa kanala bez nekog narocitog razloga, diskriminacija istih i tako dalje.<br/>
<b>6.</b> Urednik mora postovati odluke Top Urednika, odnosno Admina, tj. nadredjenih osoba. Zabranjeno je zapocnjati otvorenu svadju i raspravu sa Administracijom.<br/>
<b>7.</b> Urednici samo paze na red na chatu i nemaju to ovlascenje da se mesaju u rad samog chata. S druge strane, u redu je od strane Urednika ako uputi neki predlog ili sugestiju koja ce biti razmotrena.<br/>
<b>8.</b> Urednik ne treba sam da resava problem koji ima u pogledu nekog drugog Urednika, vec treba da se obrati nekom od Admina, ukoliko smatra da drugi Urednik gresi u nekom pogledu.Primedbe koje ce jedan Urednik izneti protiv drugog moraju da se iznesu u prisustvu Urednika protiv koga su primedbe iznete i u prisustvu Admina.<br/>

<b>9.</b> Promena NICKa Urednika je zabranjena.S druge strane, dozvoljena je promena NICKa ukoliko se u novom nicku sadrzi i NICK sa kojim se Urednik nalazi na listi. Ako, u nekom trenutku, Urednik pozeli da za stalno promeni svoj NICK, duzan je o tome obavestiti Admina, a nakon toga svoj stari NICK da drzi u IME polju narednih 15 - 30 dana, u zavisnosti koliko je potrebno korisnicima i drugim Urednicima da upoznaju novi NICK Urednika.<br/>
<b>10.</b> NICK Urednika ne sme da bude diskriminirajuce po druge u pogledu verskog, nacionalnog, sportsko - navijackog ili vulgarnog karaktera.<br/>
<b>11.</b> Za slucajne banove koje Urednik napravi, duzan je da skine ban, i javi se korisniku kako bi mu se izvinuo i rekao mu da mu je ponovo omogucen ulazak na chat.<br/>
<b>12.</b> Ukoliko korisnik javno vredja Urednike, Urednici imaju pravo da ga izbace sa chata na najvise 24h. Ukoliko se vredjanje nastavi, Urednik moze da stavi ban.<br/>
<b>13.</b> Urednik iako ima status, mora znati da to sto on ima status ne znaci da je u povlascenom polozaju u odnosu na korisnika.On ne moze da koristi svoj status protiv neke osobe koja njemu nije uradila nista nazao, i da se pokazuje kao "moc" na chatu.<br/>
<b>14.</b> Urednik svoje sifre od NICKa i slicno, NE SME DA DAJE NIKOME, njegovom prijatelju, prijateljici, momku, devojkci i sl.<br/><br/>

<b>
Metode sankcionisanja korisnika:<br/>
</b>
Korisnik se moze sankcionisati na tri razlicita nacina, zavisno od prekrsaja i statusa Urednika:<br/>
<b>kick</b> - privremeno izbacivanje nicka<br/>
<b>ban</b> - trajno zakljucavanje nicka<br/>
<b>ipban</b> - privremena zabrana pristupa chatu<br/><br/>

Kick se korisi u slucaju manjeg prekrsaja, i kao upozorenje korisniku da prestane vrsiti aktivnosti koje su neprikladne. Tad je pozeljno koristiti kratak kick do 5min sa jasnim razlogom<br/>
Kick se koristi u slucaju da korisnik javno provocira druge svojom pricom na kanalu, i kao takav se koristi za ucutkavanje korisnika. Takav Kick moze biti postavljen od 1 ? 30 minuta, u zavisnosti koliko je potrebno. Ukoliko korisnik prizna da je pogresio i da nece nastaviti slicne aktivnosti, Kick se moze skinuti.<br/><br/>

Ban se koristi ukoliko korisnik ne prihvata dalje utvrdjena pravila o ponasanju korisnika, i svojim ponasanjem na kanalu krsi ono sto je time odredjeno, kao sto je FLOOD, javno VREDJANJE na bilo kakvoj osnovi, PSOVANJE, neprikladno ponasanje, reklamiranje drugih chatova i sl.
Ukoliko se izbacuje los, odnosno perverzan NICK koristi se ban. Reklame drugih chatova i flood, kao i druge slicne vidove, koje Urednik ne moze da spreci banovanjem, treba prijaviti Top Uredniku ili Adminu, radi udaljivanja takvih osoba sa chata ipban-om.<br/><br/>

IPBAN se koristi za korisnike koji pokusavaju registraciom novih nickova da zaobidju gore pomenute sankcije.<br/><br/>

U slucaju dokumentovanog krsenja neke od stavki pravilnika za Urednike Administator ce bez ikakvog daljeg objasnjenja obrisati Urednika sa liste Urednika. Takodje bilo kakvo narusavnaje ugleda chata, vredjanje drugih Urednika ili bilo kakav gest koji steti Srb W@P Chatu prouzrokovace gubitak statusa!<br/>

Urednik, svoje postupke nije duzan da pravda nikom do Top Uredniku ili Adminu. Admin svoje postupke uopste nije duzan nikom da pravda, ako ne zeli.<br/> 
	';
	break;
	//режим статусы
	case 'statusy':
	//печатаем страницу статусы
	print "Status vam odredjuje broj poruka odnosno postova, ukoliko imate veci status mozete da saljete vise smajila ili npr da dobijete moderatosku funkciju, ponudjeni se rangiraju ovako:<br/><br/>";
	print "0 poruka --- Novajlija<br/>
1 - 100 --- Obican chater<br/>
100 - 500 --- Super chater<br/>
500 - 1000 --- Bronzani chater<br/>
1000 - 3000 --- Srebrni chater<br/>
3000 - 5000 --- Zlatni chater<br/>
5000 - 7000 --- Ekstra chater<br/>
7000 - 10000 --- Admin vam moze dodeliti razni status<br/>";
	break;
	//режим приват
	case 'privat':
	print 'Svi znate uglavnom,sta je pvt-privatne poruke.Ovde rade na principu pisanja pvt poruke i na javnom delu i na privatnom a da niko to ne moze da vidi.<br/><br/>';
	break;
	case 'photo':
	print 'Ukoliko zelite da imate svoju fotku u profilu,posaljite je mms-om ili email-om na srbwap@gmail.com tako da drugi mogu da vas vide, obavezno je napisati nick. Fotka ce u naredna 24-48h biti ubacena u vas profil<br/><br/>';
	break;
	//режим транслит
	case 'translit':
	//печатаем правила транслита
	print "Транслит - это такая вещь, когда вы пишете на латинице, а все написанное переводится на кирилицу! Правила транслита: <br/>А а - A a<br/>Б б - B b<br/>В в - V v<br/>G g - G g<br/>Д д - D d<br/>Е е - E e<br/>Ё ё - Yo yo<br/>Ж ж - Zh zh<br/>З з - Z z<br/>И и - I i<br/>Й й - J j<br/>�s к - K k<br/>Л л - L l<br/>М м - M m<br/>Н н - N n<br/>�z о - O o<br/>П п - P p<br/>Р р - R r<br/>С с - S s<br/>Т т - T t<br/>У у - U u<br/>Ф ф - F f<br/>Х х - H h<br/>Ц ц - C c<br/>Ч ч - Ch ch<br/>Ш ш - Sh sh<br/>Щ щ - Shc shc<br/>�s - ''<br/>Ы ы - Y y<br/>ь - '<br/>Э э - Ye ye<br/>Ю �z - Yu yu<br/>Я я - Ya ya";
	break;
	//режим помощи о викторине
	case 'vict':
	//печатаем правила транслита
	print 'Викторина - это место, где вы можете опробывать свои знания! Прогрмным путем выводится вопрос, на который надо как можно быстрее дать ответ. Если в течении 2 минут никто правильно не ответит, будет задан новый вопрос. Писать ответы нужно на русском! Если ваш телефон не поддерживает написание на кирилице, воспользуйтесь транслитерацией из латиницы в кирилицу. Прочитайте правила транслита!';
	break;
	//по умолчани�z
	default:
	//печатаем ссылки на помощь
	print "<a href=\"help.php?id=$id&amp;pass=$pass&amp;mod=rules\">".$lang['rules']."</a><br/>";
	
	print "<a href=\"help.php?id=$id&amp;pass=$pass&amp;mod=statusy\">".$lang['ranks']."</a><br/>";
	print "<a href=\"help.php?id=$id&amp;pass=$pass&amp;mod=privat\">".$lang['privat']."</a><br/>";
	print "<a href=\"help.php?id=$id&amp;pass=$pass&amp;mod=ignor\">".$lang['ign']."</a><br/>";
	print "<a href=\"./sm/index.php?id=$id&amp;pass=$pass&amp;mod=smiles\">".$lang['smiles']."</a><br/>";
	break; }
	if($mod)
	print "<br/><a href=\"help.php?id=$id&amp;pass=$pass\">".$lang['help']."</a>";
	print "<br/><a href=\"./enter.php?id=$id&amp;pass=$pass\">".$lang['holl']."</a><br/>";
		} else { print $lang['not_loged']; }
print '</p>'.
'</card>'.
'</wml>';
ob_end_flush();
//разрываем соединение с бд
@mysql_close();
?>
