declare module 'pinia' {
  export function defineStore(id: string, options: any): any;
  export function createPinia(): any;
}

declare module '@fortawesome/fontawesome-svg-core' {
  export const library: any;
}

declare module '@fortawesome/free-solid-svg-icons' {
  export const fas: any;
}

declare module '@fortawesome/vue-fontawesome' {
  export const FontAwesomeIcon: any;
}

declare module 'vite/client'; 