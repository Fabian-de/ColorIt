import { UserService} from './../../services/user.service';
import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';
import { Storage } from '@ionic/storage';

@Component({
  selector: 'app-users',
  templateUrl: './users.page.html',
  styleUrls: ['./users.page.scss'],
})
export class UsersPage implements OnInit {

  user: any;
  users: any;
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
          this.getUsers();
        } 
      });
    }
  }

  createUser() {
  
    if (this.existsUser()){
      this.storage.get('user').then((val) => {
        if (val !== null){
          this.user = val;
        }     
      });
    } 
    
    if (this.user == null){
      this.userService.createUser().subscribe(res => {
        this.user = res;
        this.storage.set('userId', res.id);
        this.storage.set('apiKey', res.api_token);
        this.storage.set('user', res);
      });
      this.getUsers();
    }   
  }

  existsUser(){
    return this.storage.get('user');    
  }

  getApiKey(){
    return this.storage.get('apiKey');     
  }
  deleteUser(){
    this.storage.remove('userId')
      .then(
        data => console.log(data),
        error => console.error(error)
      );
  }

  private showColor: boolean = false;

  showColors(userId){
    if(this.showColor === false){
      this.showColor = true;
      document.getElementById("showColors-"+userId).hidden = false;
      document.getElementById("randomizer-"+userId).hidden = false;
    }else if(this.showColor === true){
      this.showColor = false;
      document.getElementById("showColors-"+userId).hidden = true;
      document.getElementById("randomizer-"+userId).hidden = true;
    }
  }

  randomColors(userId) {
    let userData= this.user;      
    let totalColors = userData.colors.length;
    let i = totalColors - 1;
    let colorList = '';

    for (i; i > 0; i--) {
      const j = Math.floor(Math.random() * i)
      const temp = userData.colors[i]
      userData.colors[i] = userData.colors[j]
      userData.colors[j] = temp
    }

    userData.colors.forEach(element => {
      colorList += '<div class="colorbox" style="background-color:'+element.color+'; display: inline-block; width:6em; height:2em; margin-bottom: 2px; clear:both;">'+'</div><br>';
    });
      
    document.getElementById('showColors-'+userId).innerHTML = colorList;
  }

  getUsers() {
    this.userService.getUsers().subscribe(res => {
      this.users = res;
    });
  }




}