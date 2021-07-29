import { Component, OnInit } from '@angular/core';
import { AuthService } from '../_services/auth.service';
import { TokenStorageService } from '../_services/token-storage.service';
import {User} from '../model/user';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {
  form: any = {
    username: null,
    password: null
  };
  isLoggedIn = false;
  isLoginFailed = false;
  errorMessage = '';
  user: User = {
    id: 0,
    email: '',
    roles: [],
    name: '',
    phone: 0,
    points: 0,
    isAdmin: false,
    username: ''
  };

  constructor(private authService: AuthService, private tokenStorage: TokenStorageService) { }

  ngOnInit(): void {
    if (this.tokenStorage.getToken() && this.tokenStorage.getUser()) {
      this.isLoggedIn = true;
      this.user = this.tokenStorage.getUser();
      console.log(this.user);
    }
  }

  onSubmit(): void {
    const { username, password } = this.form;

    this.authService.login(username, password).subscribe(
      data => {
        this.tokenStorage.saveToken(data.token);
        this.isLoginFailed = false;
        this.isLoggedIn = true;
        this.authService.getUser(data.token).subscribe(
          user => {
            this.tokenStorage.saveUser(user);
            this.reloadPage();
          },
          err => {
            this.errorMessage = err.error.message;
            this.isLoginFailed = true;
            this.isLoggedIn = false;
          }
        );
      },
      err => {
        this.errorMessage = err.error.message;
        this.isLoginFailed = true;
      }
    );
  }

  reloadPage(): void {
    window.location.reload();
  }
}
