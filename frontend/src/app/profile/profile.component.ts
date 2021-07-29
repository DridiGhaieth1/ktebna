import { Component, OnInit } from '@angular/core';
import { TokenStorageService } from '../_services/token-storage.service';
import {User} from '../model/user';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss']
})
export class ProfileComponent implements OnInit {
  currentUser: User = {
    id: 0,
    email: '',
    roles: [],
    name: '',
    phone: 0,
    points: 0,
    isAdmin: false,
    username: ''
  };
  currentToken: any;
  constructor(private token: TokenStorageService) {
    this.currentToken = token;
  }

  ngOnInit(): void {
    this.currentUser = this.token.getUser();
    this.currentToken = this.token.getToken();
  }
}
