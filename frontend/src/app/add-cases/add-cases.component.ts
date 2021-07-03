import {Component, OnInit} from '@angular/core';
import {Router} from '@angular/router';
import {ApiService} from '../shared/api.service';
import {FormBuilder, FormControl, FormGroup, FormGroupDirective, NgForm, Validators} from '@angular/forms';
import {ErrorStateMatcher} from '@angular/material/core';

// todo: (template driven) Appliquez l’approches « Template driven Forms » dans votre projet
export class MyErrorStateMatcher implements ErrorStateMatcher {
  isErrorState(control: FormControl | null, form: FormGroupDirective | NgForm | null): boolean {
    const isSubmitted = form && form.submitted;
    return !!(control && control.invalid && (control.dirty || control.touched || isSubmitted));
  }
}

@Component({
  selector: 'app-add-cases',
  templateUrl: './add-cases.component.html',
  styleUrls: ['./add-cases.component.scss']
})
export class AddCasesComponent implements OnInit {

  casesForm!: FormGroup;
  name = '';
  gender = '';
  age = 0;
  address = '';
  city = '';
  country = '';
  status = '';
  statusList = ['Positive', 'Dead', 'Recovered'];
  genderList = ['Male', 'Female'];
  isLoadingResults = false;
  matcher = new MyErrorStateMatcher();

  constructor(private router: Router, private api: ApiService, private formBuilder: FormBuilder) {
    this.router = router;
    this.api = api;
    this.formBuilder = formBuilder;
  }

  ngOnInit(): void {
    // todo: (template driven) Appliquez l’approches « Template driven Forms » dans votre projet
    this.casesForm = this.formBuilder.group({
      name: [null, Validators.required],
      gender: [null, Validators.required],
      age: [null, Validators.required],
      address: [null, Validators.required],
      city: [null, Validators.required],
      country: [null, Validators.required],
      status: [null, Validators.required]
    });
  }

  // todo: (template driven) Appliquez l’approches « Template driven Forms » dans votre projet
  onFormSubmit(): void {
    this.isLoadingResults = true;
    this.api.addCases(this.casesForm.value)
      .subscribe((res: any) => {
        this.isLoadingResults = false;
        this.router.navigate(['/cases-details', res.id]).then(r => console.log(r));
      }, (err: any) => {
        console.log(err);
        this.isLoadingResults = false;
      });
  }

}
