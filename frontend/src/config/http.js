import axios from 'axios';

const http = axios.create({
  baseURL: 'http://localhost:8000/api/',
});

export default http;
