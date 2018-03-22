import { Component } from '@angular/core';

import { App, NavController, ModalController, ViewController } from 'ionic-angular';


@Component({
  template: `
    <ion-list>
      <button ion-item (click)="close('http://rada.gov.ua')">Сайт ВРУ</button>
      <button ion-item (click)="close('https://www.facebook.com/groups/1626226020974914/')">Група на фейсбуці</button>
      <button ion-item (click)="close('https://www.facebook.com/profile.php?id=100009345787130')">Островка Еріх</button>
      <button ion-item (click)="close('https://www.facebook.com/DmytroKekukh')">Кекух Дмитро</button>
      <button ion-item (click)="support()">Підтримка</button>
    </ion-list>
  `
})
export class PopoverPage {

  constructor(
    public viewCtrl: ViewController,
    public navCtrl: NavController,
    public app: App,
    public modalCtrl: ModalController
  ) { }

  support() {
    this.app.getRootNav().push('SupportPage');
    this.viewCtrl.dismiss();
  }

  close(url: string) {
    window.open(url, '_blank');
    this.viewCtrl.dismiss();
  }
}
