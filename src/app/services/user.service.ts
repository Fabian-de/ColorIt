import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';
import { Storage } from '@ionic/storage';

@Injectable({
  providedIn: 'root'
})
export class UserService {

  url = 'http://127.0.0.1:8000/api/users';
  apiKey = '';
  users: any;

  /**
   * Constructor of the Service with Dependency Injection
   * @param http The standard Angular HttpClient to make requests
   */
  constructor(private http: HttpClient) { }
 
  randomColors(userId){    
    for(let userData of this.users ){
      if (userData.id != userId)
        continue;

      let totalColors = userData.colors.length;
      console.warn(totalColors);
      let i = totalColors -1;
      for(i; i > 0; i--){
        const j = Math.floor(Math.random() * i)
        const temp = userData.colors[i]
        userData.colors[i] = userData.colors[j]
        userData.colors[j] = temp
      }  
    }
  }

  getUsers(){
    const url = this.url;
    return this.http.get(url).pipe(map((res: any) => {
      return res;
    }));
  }

  createUser() {
    const url = this.url;
    return this.http.post(url,'').pipe(map((res: any) => {
      return res;
    }));
  }
  
  getUserColors(userId: number, apiKey: string) {
    const url = this.url + '/' + userId+'/colors?api_key='+apiKey;
    return this.http.get(url).pipe(map((res: any) => {
      return res;
    }));
  }

  deleteUser(userId: number, apiKey: string) { 
    const url = this.url + '/' + userId+'/delete?api_key='+apiKey;
    return this.http.get(url).pipe(map((res: any) => {
      return res;
    }));
  }

}