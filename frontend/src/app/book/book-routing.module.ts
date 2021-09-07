import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { DetailsComponent } from './details/details.component';
import { CreateComponent } from './create/create.component';
import { UpdateComponent } from './update/update.component';
import {BookHomeComponent} from './book-home/book-home.component';
const routes: Routes = [
  { path: 'book', redirectTo: 'book/home', pathMatch: 'full'},
  { path: 'book/home', component: BookHomeComponent },
  { path: 'book/details/:bookId', component: DetailsComponent },
  { path: 'book/create', component: CreateComponent },
  { path: 'book/update/:bookId', component: UpdateComponent }

];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class BookRoutingModule { }
