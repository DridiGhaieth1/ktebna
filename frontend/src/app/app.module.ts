import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';

import {AppRoutingModule} from './app-routing.module';
import {AppComponent} from './app.component';
import {CasesComponent} from './cases/cases.component';

import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import {HttpClientModule} from '@angular/common/http';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';

import {MatInputModule} from '@angular/material/input';
import {MatPaginatorModule} from '@angular/material/paginator';
import {MatProgressSpinnerModule} from '@angular/material/progress-spinner';
import {MatSortModule} from '@angular/material/sort';
import {MatTableModule} from '@angular/material/table';
import {MatIconModule} from '@angular/material/icon';
import {MatButtonModule} from '@angular/material/button';
import {MatCardModule} from '@angular/material/card';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatSliderModule} from '@angular/material/slider';
import {MatSlideToggleModule} from '@angular/material/slide-toggle';
import {MatButtonToggleModule} from '@angular/material/button-toggle';
import {MatSelectModule} from '@angular/material/select';
import {MatMenuModule} from '@angular/material/menu';
import {MatToolbarModule} from '@angular/material/toolbar';
import {CasesDetailsComponent} from './cases-details/cases-details.component';
import {AddCasesComponent} from './add-cases/add-cases.component';
import {EditCasesComponent} from './edit-cases/edit-cases.component';
import {CasesStatComponent} from './cases-stat/cases-stat.component';
import {ChartsModule} from 'ng2-charts';
import {CasesListComponent} from './cases-list/cases-list.component';
import {CasesListElementComponent} from './cases-list-element/cases-list-element.component';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';
import { HomeComponent } from './home/home.component';
import { ProfileComponent } from './profile/profile.component';
import { BoardAdminComponent } from './board-admin/board-admin.component';
import { BoardUserComponent } from './board-user/board-user.component';
import { BoardUserComponent } from './board-user/board-user.component';

import { authInterceptorProviders } from './_helpers/auth.interceptor';

@NgModule({
  declarations: [
    AppComponent,
    CasesComponent,
    CasesDetailsComponent,
    AddCasesComponent,
    EditCasesComponent,
    CasesStatComponent,
    CasesListComponent,
    CasesListElementComponent,
    LoginComponent,
    RegisterComponent,
    HomeComponent,
    ProfileComponent,
    BoardAdminComponent,
    BoardUserComponent
  ],
  imports: [
    BrowserModule,
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MatInputModule,
    MatPaginatorModule,
    MatProgressSpinnerModule,
    MatSortModule,
    MatTableModule,
    MatIconModule,
    MatButtonModule,
    MatCardModule,
    MatFormFieldModule,
    MatSliderModule,
    MatSlideToggleModule,
    MatButtonToggleModule,
    MatSelectModule,
    MatSelectModule,
    MatMenuModule,
    MatToolbarModule,
    ChartsModule
  ],
  providers: [authInterceptorProviders],
  bootstrap: [AppComponent]
})
export class AppModule {
}
