import {Injectable} from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {Observable} from 'rxjs';

const AUTH_API = 'http://backend.ktebna.tn/api/';

const httpOptions = {
  headers: new HttpHeaders({'Content-Type': 'application/json'})
};

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  constructor(private http: HttpClient) {
  }

  login(username: string, password: string): Observable<any> {
    return this.http.post(AUTH_API + 'login_check', {
      username,
      password
    }, httpOptions);
  }

  getUser(token: string | null): Observable<any> {
    return this.http.get(AUTH_API + 'users/token', {
      headers: new HttpHeaders({'Content-Type': 'application/json'})
    });
  }

  register(username: string, email: string, password: string): Observable<any> {
    return this.http.post(AUTH_API + 'signup', {
      username,
      email,
      password
    }, httpOptions);
  }
}
