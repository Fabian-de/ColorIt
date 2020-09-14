import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  { path: '', redirectTo: 'user-details', pathMatch: 'full' },
  { path: 'users', loadChildren: './pages/users/users.module#UsersPageModule' },
  { path: 'user-details', loadChildren: './pages/user-details/user-details.module#UserDetailsPageModule' },
  {
    path: 'user-settings',
    loadChildren: () => import('./pages/user-settings/user-settings.module').then( m => m.UserSettingsPageModule)
  }
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }

 
