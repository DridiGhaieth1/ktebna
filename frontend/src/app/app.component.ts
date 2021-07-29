import {Component, OnInit} from '@angular/core';
import {TokenStorageService} from './_services/token-storage.service';
import {User} from './model/user';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})

export class AppComponent implements OnInit {
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
  isLoggedIn = false;
  showAdminBoard = false;
  username?: string;
  title = 'KTEBNA';

  constructor(private tokenStorageService: TokenStorageService) {
  }

  ngOnInit(): void {
    this.isLoggedIn = !!this.tokenStorageService.getToken();

    if (this.isLoggedIn) {
      this.user = this.tokenStorageService.getUser();
      this.showAdminBoard = false;
      this.username = this.user.email;
    }
  }

  logout(): void {
    this.tokenStorageService.signOut();
    window.location.reload();
  }
}
