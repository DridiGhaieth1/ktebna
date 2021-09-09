import { Injectable } from '@angular/core';
import {Author} from '../model/author';
import { HttpHeaders } from '@angular/common/http';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';
import {catchError, retry, tap} from 'rxjs/operators';
import {Book} from './book';

const httpOptions = {headers: new HttpHeaders({"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8", }) };
@Injectable({
  providedIn: 'root'
})

export class BookService {
  constructor(private http: HttpClient) { }


  post(c: Book): Observable<any>{
    const headers = { 'content-type': 'application/json'};
    const body = JSON.stringify(c);
    console.log(JSON.stringify(c));
    return this.http.post<Book>('http://backend.ktebna.tn/api/books', body,{'headers' : headers});
  }
  getAll(): Observable<Book[]> {
    return this.http.get<Book[]>('http://backend.ktebna.tn/api/books');
  }
  delete(id: any): Observable<any> {
    return this.http.delete(`http://backend.ktebna.tn/api/books`);
  }
  update(book: any): Observable<any>{
    return this.http.put(`http://backend.ktebna.tn/api/books/${book.id}`, book);
  }

  getById(id: any): Observable<Book> {
    return this.http.get<Book>('http://backend.ktebna.tn/api/books/' + id);
  }
  getAuthors(): Observable<Author[]> {
    return this.http.get<Author[]>('http://backend.ktebna.tn/api/autors');
  }
}
