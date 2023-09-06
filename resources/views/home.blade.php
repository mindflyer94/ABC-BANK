@extends('layouts.layout')
@section('container')
<div class="col-md-12 col-lg-8 offset-2">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Welcome {{ucfirst(Auth::user()->name)}}</h3>
                  </div>
                  <div class="card-table table-responsive">
                    <table class="table table-vcenter">
                      <tr>
                        <td>
                         <h4>Your ID</h4>
                        </td>
                        <td class="text-muted">{{Auth::user()->email}}</td>
                      </tr>
                      <tr>
                        <td>
                         <h4>Your Balance</h4>
                        </td>
                        <td class="text-muted">{{Auth::user()->balance??number_format(0, 2)}} INR</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
@endsection