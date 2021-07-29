import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';
import {CasesComponent} from './cases/cases.component';
import {CasesDetailsComponent} from './cases-details/cases-details.component';
import {AddCasesComponent} from './add-cases/add-cases.component';
import {EditCasesComponent} from './edit-cases/edit-cases.component';
import {CasesStatComponent} from './cases-stat/cases-stat.component';
import {CasesListComponent} from './cases-list/cases-list.component';
import { RegisterComponent } from './register/register.component';
import { LoginComponent } from './login/login.component';
import { HomeComponent } from './home/home.component';
import { ProfileComponent } from './profile/profile.component';
import { BoardUserComponent } from './board-user/board-user.component';
import { BoardAdminComponent } from './board-admin/board-admin.component';
import {AuteurComponent} from "./auteur/auteur.component";
import {ShowAuteurComponent} from "./show-auteur/show-auteur.component";
import {EditAuteurComponent} from "./edit-auteur/edit-auteur.component";
import {AddAuteurComponent} from "./add-auteur/add-auteur.component";


// todo: (routing) Configurez les routes et liens nécessaires à votre application
const routes: Routes = [
  {path: '',  component: CasesComponent, pathMatch: 'full'},
  {
    path: 'cases',
    component: CasesComponent,
    data: {title: 'List of Cases'}
  },
  // todo: (routing) Vous devez exploiter au moins une route paramétrée
  {
    path: 'cases-details/:id',
    component: CasesDetailsComponent,
    data: {title: 'Cases Details'}
  },
  {
    path: 'add-cases',
    component: AddCasesComponent,
    data: {title: 'Add Cases'}
  },
  {
    path: 'edit-cases/:id',
    component: EditCasesComponent,
    data: {title: 'Edit Cases'}
  },
  {
    path: 'cases-stat',
    component: CasesStatComponent,
    data: {title: 'Cases Statistic'}
  },
  {
    path: 'cases-list',
    component: CasesListComponent,
    data: {title: 'Cases List'}
  },
  {
  path: 'auteur',
  component: AuteurComponent },
  {
    path: 'auteur/show',
    component: ShowAuteurComponent },
  {
    path: 'auteur/edit',
    component: EditAuteurComponent },
  {
    path: 'auteur/add',
    component: AddAuteurComponent },
  { path: 'home', component: HomeComponent },
  { path: 'login', component: LoginComponent },
  { path: 'register', component: RegisterComponent },
  { path: 'profile', component: ProfileComponent },
  { path: 'user', component: BoardUserComponent },
  { path: 'admin', component: BoardAdminComponent },
  { path: '', redirectTo: 'home', pathMatch: 'full' }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {
}
