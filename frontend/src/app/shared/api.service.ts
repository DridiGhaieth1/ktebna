// todo: (CRUD) Injectez le service crée au(x) bon(s) endroit(s) et appelez les différentes méthodes de
// CRUD que vous avez créé. Il faut que toutes les méthodes créées dans le service
// soient utilisées.
import {Injectable} from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {Observable, of} from 'rxjs';
import {catchError, tap} from 'rxjs/operators';
import {Cases} from '../model/cases';
import {Statistic} from '../model/statistic';

const httpOptions = {
  headers: new HttpHeaders({'Content-Type': 'application/json'})
};

const apiUrl = 'http://localhost:3000/';
const casesApiUrl = apiUrl + 'cases';
const statisticsApiUrl = apiUrl + 'statistics';

@Injectable({
  providedIn: 'root'
})

export class ApiService {

  constructor(private http: HttpClient) {
    this.http = http;
  }

  // todo: (search) Votre application doit contenir au moins une fonctionnalité de recherche multicritère
  getCases(name: string = '', status: string = '', gender: string = ''): Observable<Cases[]> {
    // noinspection JSUnusedLocalSymbols
    let like = '?';
    if (name) {
      like += `name_like=(?<=.*)${name}(?=.*)`;
    } else {
      like += `name_like=(?<=.*)(?=.*)`;
    }
    if (status && status !== 'All') {
      like += `&status=${status}`;
    } else {
      like += ``;
    }
    if (gender && gender !== 'All') {
      like += `&gender=${gender}`;
    } else {
      like += ``;
    }
    // noinspection JSUnusedLocalSymbols
    return this.http.get<Cases[]>(`${casesApiUrl}${like}`)
      .pipe(
        tap(cases => console.log('fetched cases')),
        catchError(this.handleError([]))
      );
  }

  // todo: (model) Créez un modèle de données pour lequel vous allez créer les méthodes CRUD
  getCasesById(id: string): Observable<Cases> {
    const url = `${casesApiUrl}/${id}`;
    return this.http.get<Cases>(url).pipe(
      tap(_ => console.log(`fetched cases id=${id}`)),
      catchError(this.handleError<Cases>())
    );
  }

  addCases(cases: Cases): Observable<Cases> {
    return this.http.post<Cases>(casesApiUrl, cases, httpOptions).pipe(
      tap((c: Cases) => console.log(`added cases w/ id=${c.id}`)),
      catchError(this.handleError<Cases>())
    );
  }

  updateCases(id: number, cases: Cases): Observable<any> {
    const url = `${casesApiUrl}/${id}`;
    return this.http.put(url, cases, httpOptions).pipe(
      tap(_ => console.log(`updated cases id=${id}`)),
      catchError(this.handleError<any>())
    );
  }

  deleteCases(id: string): Observable<Cases> {
    const url = `${casesApiUrl}/${id}`;
    return this.http.delete<Cases>(url, httpOptions).pipe(
      tap(_ => console.log(`deleted cases id=${id}`)),
      catchError(this.handleError<Cases>())
    );
  }

  getStatistic(status: string): Observable<Statistic> {
    const url = `${statisticsApiUrl}?label=${status}`;
    return this.http.get<Statistic>(url).pipe(
      tap(_ => console.log(`fetched statistic status=${status}`)),
      catchError(this.handleError<Statistic>())
    );
  }

  private handleError<T>(result?: T): (error: any) => Observable<T> {
    return (error: any): Observable<T> => {
      console.error(error);
      return of(result as T);
    };
  }
}
