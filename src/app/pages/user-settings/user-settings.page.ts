import { UserService} from './../../services/user.service';
import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { Storage } from '@ionic/storage';

@Component({
  selector: 'app-user-settings',
  templateUrl: './user-settings.page.html',
  styleUrls: ['./user-settings.page.scss'],
})
export class UserSettingsPage implements OnInit {
  user: any;
  /**
   * @param userService The user Service to get data
   * @param storage to store the user data
   */
  constructor(private userService: UserService, private storage: Storage) { }
 
  ngOnInit() {
    if (this.existsUser()){
      this.storage.get('user').then((val) => {
        if (val !== null){
          this.user = val;
        }
      });
   }
  }

  existsUser(){
    return this.storage.get('user');     
  }

  getApiKey(){
    return this.storage.get('apiKey');     
  }

  deleteUser(){
    let apiKey = this.getApiKey();
    this.userService.deleteUser(this.user.id, this.user.api_token ).subscribe(res => {
      this.storage.remove('userId');
      this.storage.remove('user');
      window.location.href = '/user-details';
    });
  }

}