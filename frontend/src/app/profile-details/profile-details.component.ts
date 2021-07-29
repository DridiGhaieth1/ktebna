import {Component, OnInit} from '@angular/core';

import {ActivatedRoute, Router} from '@angular/router';
import {ApiService} from '../shared/api.service';
import {User} from '../model/user';
import {DatePipe} from '@angular/common';
import {TokenStorageService} from '../_services/token-storage.service';

@Component({
  selector: 'app-profile-details',
  templateUrl: './profile-details.component.html',
  styleUrls: ['./profile-details.component.scss'],
  providers: [DatePipe]
})
export class ProfileDetailsComponent implements OnInit {

  currentDate = new Date();

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
  isLoadingResults = true;
  constructor(private token: TokenStorageService, private route: ActivatedRoute, private api: ApiService, private router: Router) {
    this.route = route;
    this.api = api;
    this.router = router;
  }

  getProfileDetails(id: string): void {
    this.api.getProfile()
      .subscribe((data: any) => {
        this.user = data;
        console.log(this.user);
        this.isLoadingResults = false;
      });
  }

  ngOnInit(): void {
    this.getProfileDetails(this.token.getUser().id);
  }

}
