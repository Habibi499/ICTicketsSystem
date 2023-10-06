<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }


    public function departmentHead(): BelongsTo
    {
        return $this->belongsTo(User::class, 'DepartmentHeadID');
    }

    public function ticketCategories()
    {
        return $this->belongsToMany(Ticket::class, 'category_user', 'user_id', 'ticket_category_id');
    }
    public function ticket_categories()
    {
        return $this->belongsToMany(TicketCategory::class, 'category_user', 'user_id', 'ticket_category_id');
    }
        // User.php (User model)
        public function approvedTickets()
        {
            return $this->hasMany(Ticket::class, 'HodApproverName');
        }

        public function userAssignments()
        {
            return $this->hasMany(UserAssignment::class);
        }

        public function categories()
        {
            return $this->belongsToMany(Category::class, 'category_user', 'user_id', 'ticket_category_id');
        }

    


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'department_id',
        'password',
        'role_id',
        'LeaveStatus'
        
       
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
