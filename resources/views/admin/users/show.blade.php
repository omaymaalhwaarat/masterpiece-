@extends('layouts.admin')

@section('content')
<div class="users-container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>تفاصيل المستخدم</h2>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
      <i class="fas fa-arrow-left me-2"></i>العودة إلى المستخدمين
    </a>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <h5>المعلومات الأساسية</h5>
          <table class="table table-bordered">
            <tr>
              <th>ID</th>
              <td>{{ $user->id }}</td>
            </tr>
            <tr>
              <th>الاسم</th>
              <td>{{ $user->name }}</td>
            </tr>
            <tr>
              <th>البريد الإلكتروني</th>
              <td>{{ $user->email }}</td>
            </tr>
            <tr>
              <th>الدور</th>
              <td>
                <span class="badge bg-{{ $user->role == 'admin' ? 'primary' : 'secondary' }}">
                  {{ $user->role == 'admin' ? 'مدير' : 'مستخدم عادي' }}
                </span>
              </td>
            </tr>
            <tr>
              <th>تاريخ التسجيل</th>
              <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @if($user->deleted_at)
            <tr>
              <th>تاريخ الحذف</th>
              <td>{{ $user->deleted_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endif
          </table>
        </div>
        
        <div class="col-md-6">
          <h5>الإحصائيات</h5>
          <div class="card stat-card mb-3">
            <div class="card-body">
              <div class="stat-value">{{ $user->orders_count }}</div>
              <div class="stat-label">عدد الطلبات</div>
              <i class="fas fa-shopping-cart stat-icon"></i>
            </div>
          </div>
          <div class="card stat-card mb-3">
            <div class="card-body">
              <div class="stat-value">{{ $user->reviews_count }}</div>
              <div class="stat-label">عدد التقييمات</div>
              <i class="fas fa-star stat-icon"></i>
            </div>
          </div>
        </div>
      </div>
      
      <div class="mt-4">
        @if($user->deleted_at)
          <form action="{{ route('admin.users.restore', $user->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">
              <i class="fas fa-trash-restore me-2"></i>استعادة المستخدم
            </button>
          </form>
          <form action="{{ route('admin.users.forceDelete', $user->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من الحذف النهائي؟')">
              <i class="fas fa-trash-alt me-2"></i>حذف نهائي
            </button>
          </form>
        @else
          <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">
            <i class="fas fa-edit me-2"></i>تعديل
          </a>
          <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">
              <i class="fas fa-trash me-2"></i>حذف
            </button>
          </form>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection