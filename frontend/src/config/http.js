import axios from 'axios';

const http = axios.create({
  baseURL: 'http://172.50.4.208:8000/api/',
  headers: {
    'Access-Control-Allow-Origin': '*',
    'Content-Type': 'application/json',
  },
});

export default http;
