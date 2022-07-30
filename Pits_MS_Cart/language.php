<?php
$language_id = $_SESSION["language_id"];
class Mylanguage extends Server{

public $english= array('MS Cart', 'Home', 'Login', 'Login', 'LANGUAGE', 'ENGLISH', 'GERMAN', 'Update', 'About Us', 'Our Services', 'Privacy Policy', 'FAQ' , 'Shipping', 'Returns', 'Business', 'Get Help', 'Follow Us', 'Available', 'Out of Stock', 'Quantity', 'Buy Now', 'Add to Cart' ,' User Login','Username','Password','Login','Not a member yet?','User Registration','First Name','Last Name','Address','Postal Code','Country','--- ----SELECT-------','Phone','Email','Username','Password','Repeat Password','At Least 8 Digits','At Least One Numeric',' At least one capital letter','At least one lowercase letter','At least one special character','No robot','Register','Already a member?','Welcome...','Welcome...','Profile', 'My Cart','My Order','Log Out','Welcome','My Profile','Edit','Edit User','Update','Your Cart','SL .No','Product' ,'Name','Price','Piece','Total office', 'Delete','Select shipping address','Total','Make payment','Shop more...','Shipping address', 'Shipping confirmation', 'My orders', 'SL.Nr', 'Product ','Product Name','Product Price','Order Quantity','Total Amount','Payment Type','Order Status','Delete','Payment','UPI','Wallets','Credit/Debit/Bank Card ','Net Banking','Cash on Delivery','EMI (Simple Installment Payment)','Pay Now','Profile Updated!','USA','IND','CANADA','GERMANY','UAE','CHINA','Sign In','Sign Up','Thank you','For shoppong with us','Your order was completed successfully','Your order number is','Shop more','Username or Password Mismatch !');
public $german = array('MS Cart', 'Startseite', 'Anmelden', 'Anmelden', 'SPRACHE', 'ENGLISCH', 'DEUTSCH', 'Update', 'Über uns', 'Unsere Dienstleistungen', 'Datenschutzrichtlinie', 'FAQ', 'Versand', 'Rücksendungen', 'Unternehmen', 'Holen Sie sich Hilfe', 'Folgen Sie uns', 'Verfügbar', 'Ausverkauft', 'Menge', 'Jetzt kaufen', 'Zum Warenkorb hinzufügen' ,'Benutzeranmeldung','Benutzername','Passwort','Anmeldung','Noch kein Mitglied?','Benutzerregistrierung','Vorname','Nachname','Adresse','Postleitzahl','Land ','-------SELECT-------','Telefon','E-Mail','Benutzername','Passwort','Passwort wiederholen','Mindestens 8 Ziffern','Mindestens a Numerisch','Mindestens ein Großbuchstabe','Mindestens ein Kleinbuchstabe','Mindestens ein Sonderzeichen','kein Roboter','Registrieren','Schon Mitglied?','Willkommen...','Willkommen.. .','Profil','Mein Warenkorb','Meine Bestellung','Abmelden','Willkommen','Mein Profil','Bearbeiten','Benutzer bearbeiten','Aktualisieren','Ihr Warenkorb','SL .Nein','Produkt','Name','Preis','Stück','Gesamt', 'Löschen','Versandadresse auswählen','Gesamt','Zahlung ausführen','Mehr einkaufen...' ,'Versandadresse', 'Versandbestätigung', 'Meine Bestellungen', 'SL.Nr', 'Produkt', 'Produktname', 'Produktpreis', 'Bestellmenge', 'Gesamtbetrag' ,'Zahlungsart','Bestellstatus','Löschen','Zahlung','UPI','Geldbörsen','Kredit-/Debit-/Bankomatkarte','Net Banking','Nachnahme','EMI ( Einfache Ratenzahlung)','Jetzt bezahlen','Profil aktualisiert!','UNS','IND','KANADA','DEUTSCHLAND','VAE','CHINA','Anmelden','Registrieren','Danke','Um bei uns einzukaufen','Ihre Bestellung wurde erfolgreich abgeschlossen','Ihre Bestellnummer lautet:','Mehr einkaufen','Benutzername oder Passwort stimmen nicht überein!');

public function english(){
    return $this->english;
}
public function german(){
    return $this->german;
}

}

if($language_id==1){
  $obj=new Mylanguage;
  $language=$obj->english();
  }
else{
  $obj1=new Mylanguage;
  $language=$obj1->german();
}

?>

