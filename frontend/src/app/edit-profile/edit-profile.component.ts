import {Component, OnInit} from '@angular/core';
import {ActivatedRoute, Router} from '@angular/router';
import {ApiService} from '../shared/api.service';
import {FormBuilder, FormControl, FormGroup, FormGroupDirective, NgForm, Validators} from '@angular/forms';
import {ErrorStateMatcher} from '@angular/material/core';
import {User} from '../model/user';
import {TokenStorageService} from '../_services/token-storage.service';

export class MyErrorStateMatcher implements ErrorStateMatcher {
  isErrorState(control: FormControl | null, form: FormGroupDirective | NgForm | null): boolean {
    const isSubmitted = form && form.submitted;
    return !!(control && control.invalid && (control.dirty || control.touched || isSubmitted));
  }
}

@Component({
  selector: 'app-edit-profile',
  templateUrl: './edit-profile.component.html',
  styleUrls: ['./edit-profile.component.scss']
})
export class EditProfileComponent implements OnInit {

  profileForm!: FormGroup;
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
  isLoadingResults = false;
  matcher = new MyErrorStateMatcher();

  constructor(
    private token: TokenStorageService,
    private router: Router,
    private route: ActivatedRoute,
    private api: ApiService,
    private formBuilder: FormBuilder
  ) {
    this.router = router;
    this.route = route;
    this.api = api;
    this.formBuilder = formBuilder;
  }

  getProfile(): void {
    this.api.getProfile().subscribe((data: any) => {
      this.user.id = data.id;
      this.user.name = data.name;
      this.user.email = data.email;
      this.user.phone = data.phone;
      this.profileForm.setValue({
        name: this.user.name,
        email: this.user.email,
        phone: this.user.phone,
      });
    });
  }

  ngOnInit(): void {
    this.getProfile();
    this.profileForm = this.formBuilder.group({
      name: [null, Validators.required],
      email: [null, Validators.required],
      phone: [null, Validators.required]
    });
  }

  onFormSubmit(): void {
    this.isLoadingResults = true;
    this.api.updateProfile(this.profileForm.value)
      .subscribe((res: any) => {
          this.isLoadingResults = false;
          this.router.navigate(['/profile']).then(r => console.log(r));
        }, (err: any) => {
          console.log(err);
          this.isLoadingResults = false;
        }
      );
  }

  profileDetails(): void {
    this.router.navigate(['/profile']).then(r => console.log(r));
  }
}
