import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';

import {AppRouting} from './app-routing.module';
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
import {ProfileDetailsComponent} from './profile-details/profile-details.component';
import {AddCasesComponent} from './add-cases/add-cases.component';
import {EditProfileComponent} from './edit-profile/edit-profile.component';
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

import { authInterceptorProviders } from './_helpers/auth.interceptor';
import { AuteurComponent } from './auteur/auteur.component';
import { ShowAuteurComponent } from './show-auteur/show-auteur.component';
import { AddAuteurComponent } from './add-auteur/add-auteur.component';
import { EditAuteurComponent } from './edit-auteur/edit-auteur.component';
import {BookModule} from './book/book.module';
import { Ng2SearchPipeModule } from 'ng2-search-filter';

@NgModule({
  declarations: [
    AppComponent,
    CasesComponent,
    ProfileDetailsComponent,
    AddCasesComponent,
    EditProfileComponent,
    CasesStatComponent,
    CasesListComponent,
    CasesListElementComponent,
    LoginComponent,
    RegisterComponent,
    HomeComponent,
    ProfileComponent,
    BoardAdminComponent,
    BoardUserComponent,
    AuteurComponent,
    ShowAuteurComponent,
    AddAuteurComponent,
    EditAuteurComponent
  ],
  imports: [
    BrowserModule,
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    AppRouting,
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
    ChartsModule,
    BookModule,
    Ng2SearchPipeModule
  ],
  providers: [authInterceptorProviders],
  bootstrap: [AppComponent]
})
export class AppModule {
}
