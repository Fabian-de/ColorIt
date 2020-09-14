import { UserService } from './../../services/user.service';
import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { Storage } from '@ionic/storage';

@Component({
  selector: 'app-user-details',
  templateUrl: './user-details.page.html',
  styleUrls: ['./user-details.page.scss'],
})
export class UserDetailsPage implements OnInit {

  user: any;
  users: any;
  /**
   * Constructor of our first page
   * @param userService The movie Service to get data
   * @param storage to store the user data
   */
  constructor(private userService: UserService, private storage: Storage) { }

  ngOnInit() {
  
    if (this.existsUser()) {
      this.storage.get('user').then((val) => {
        if (val !== null) {
          this.user = val;
          this.getUserColors();         
        }
      });
    }
  }

  createUser() {
    if (this.existsUser()) {
      this.storage.get('user').then((val) => {
        if (val !== null) {
          this.user = val;
        }
      });
    }

    if (this.user == null) {
      this.userService.createUser().subscribe(res => {
        this.user = res;
        this.storage.set('userId', res.id);
        this.storage.set('apiKey', res.api_token);
        this.storage.set('user', res);
      });
    }
  }

  getUserColors(){
      let apiKey = this.getApiKey();
      this.userService.getUserColors(this.user.id, this.user.api_token ).subscribe(res => {
        this.user = res;
        this.storage.set('user', res);
      }); 
  }

  existsUser() {
    return this.storage.get('user');
  }

  getApiKey() {
    return this.storage.get('apiKey');
  }

}