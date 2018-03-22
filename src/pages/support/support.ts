import { Component } from '@angular/core';
import { NgForm } from '@angular/forms';

import { AlertController, NavController, ToastController } from 'ionic-angular';


@Component({
  selector: 'page-user',
  templateUrl: 'support.html'
})
export class SupportPage {

  submitted: boolean = false;
  supportMessage: string;

  constructor(
    public navCtrl: NavController,
    public alertCtrl: AlertController,
    public toastCtrl: ToastController
  ) {

  }

  ionViewDidEnter() {
    let toast = this.toastCtrl.create({
      message: 'Відправка повідомлень ще не налаштована.',
      duration: 3000
    });
    toast.present();
  }

  submit(form: NgForm) {
    this.submitted = true;

    if (form.valid) {
      this.supportMessage = '';
      this.submitted = false;

      let toast = this.toastCtrl.create({
        message: 'Ваше повідомлення надіслано.',
        duration: 3000
      });
      toast.present();
    }
  }

  // If the user enters text in the support question and then navigates
  // without submitting first, ask if they meant to leave the page
  ionViewCanLeave(): boolean | Promise<boolean> {
    // If the support message is empty we should just navigate
    if (!this.supportMessage || this.supportMessage.trim().length === 0) {
      return true;
    }

    return new Promise((resolve: any, reject: any) => {
      let alert = this.alertCtrl.create({
        title: 'Покинути цю сторінку?',
        message: 'Якщо ви покинете цю сторінку ваше повідомлення не буде відправлено.'
      });
      alert.addButton({ text: 'Залищитись', handler: reject });
      alert.addButton({ text: 'Покинути', role: 'cancel', handler: resolve });

      alert.present();
    });
  }
}
