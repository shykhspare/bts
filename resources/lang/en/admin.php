<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'category' => [
        'title' => 'Categories',

        'actions' => [
            'index' => 'Categories',
            'create' => 'New Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'enabled' => 'Enabled',
            
        ],
    ],

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
            'will_be_published' => 'Post will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'perex' => 'Perex',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            
        ],
    ],

    'book' => [
        'title' => 'Books',

        'actions' => [
            'index' => 'Books',
            'create' => 'New Book',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'publisher' => 'Publisher',
            'language' => 'Language',
            'author' => 'Author',
            'enabled' => 'Enabled',
            'price' => 'Price',
            'category_id' => 'Category',
            
        ],
    ],

    'test' => [
        'title' => 'Tests',

        'actions' => [
            'index' => 'Tests',
            'create' => 'New Test',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'publisher' => 'Publisher',
            'language' => 'Language',
            'date' => 'Date',
            'announce_date' => 'Announce date',
            'last_date' => 'Last date',
            'price' => 'Price',
            'category_id' => 'Category',
            
        ],
    ],

    'setting' => [
        'title' => 'Settings',

        'actions' => [
            'index' => 'Settings',
            'create' => 'New Setting',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'logo' => 'Logo',
            'footerlogo' => 'Footerlogo',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'facebook' => 'Facebook',
            'youtube' => 'Youtube',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'pinterest' => 'Pinterest',
            'footer' => 'Footer',
            'map' => 'Map',
            
        ],
    ],

    'setting' => [
        'title' => 'Settings',

        'actions' => [
            'index' => 'Settings',
            'create' => 'New Setting',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'logo' => 'Logo',
            'footerlogo' => 'Footerlogo',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'facebook' => 'Facebook',
            'youtube' => 'Youtube',
            'instagram' => 'Instagram',
            'twitter' => 'Twitter',
            'pinterest' => 'Pinterest',
            'footer' => 'Footer',
            'copyright' => 'Copyright',
            'map' => 'Map',
            
        ],
    ],

    'author' => [
        'title' => 'Authors',

        'actions' => [
            'index' => 'Authors',
            'create' => 'New Author',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'description' => 'Description',
            'enabled' => 'Enabled',
            
        ],
    ],

    'section' => [
        'title' => 'Sections',

        'actions' => [
            'index' => 'Sections',
            'create' => 'New Section',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'language' => 'Language',
            'enabled' => 'Enabled',
            'mcqs' => 'Mcqs',
            'author_id' => 'Author',
            'category_id' => 'Category',
            'book_id' => 'Book',
            
        ],
    ],

    'role' => [
        'title' => 'Roles',

        'actions' => [
            'index' => 'Roles',
            'create' => 'New Role',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'guard_name' => 'Guard name',
            
        ],
    ],

    'unit' => [
        'title' => 'Units',

        'actions' => [
            'index' => 'Units',
            'create' => 'New Unit',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'enabled' => 'Enabled',
            'mcqs' => 'Mcqs',
            'quiz_mcqs' => 'No. of Quiz Mcqs',
            'order' => 'Order',
            'section_id' => 'Section',
            
        ],
    ],

    'question' => [
        'title' => 'Questions',

        'actions' => [
            'index' => 'Questions',
            'create' => 'New Question',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'question' => 'Question',
            'q_attachment' => 'Q attachment',
            'answer' => 'Answer',
            'a_attachment' => 'A attachment',
            'order' => 'Order',
            'type' => 'Type',
            'link' => 'Link',
            'unit_id' => 'Unit',
            
        ],
    ],

    'question' => [
        'title' => 'Questions',

        'actions' => [
            'index' => 'Questions',
            'create' => 'New Question',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'question' => 'Question',
            'q_attachment' => 'Q attachment',
            'answer' => 'Answer',
            'a_attachment' => 'A attachment',
            'order' => 'Order',
            'type' => 'Type',
            'link' => 'Link',
            'unit_id' => 'Unit',
            'marks' => 'Marks',
            
        ],
    ],

    'question' => [
        'title' => 'Questions',

        'actions' => [
            'index' => 'Questions',
            'create' => 'New Question',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'question' => 'Question',
            'q_attachment' => 'Q attachment',
            'answer' => 'Answer',
            'a_attachment' => 'A attachment',
            'order' => 'Order',
            'type' => 'Type',
            'link' => 'Link',
            'unit_id' => 'Unit',
            
        ],
    ],

    'section' => [
        'title' => 'Section',

        'actions' => [
            'index' => 'Section',
            'create' => 'New Section',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'question' => [
        'title' => 'Questions',

        'actions' => [
            'index' => 'Questions',
            'create' => 'New Question',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'question' => [
        'title' => 'Questions',

        'actions' => [
            'index' => 'Questions',
            'create' => 'New Question',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            'answer' => 'Answer',
            'marks' => 'Marks',
            'order' => 'Order',
            'type' => 'Type',
            'link' => 'Link',
            'unit_id' => 'Unit',
            
        ],
    ],

    'section' => [
        'title' => 'Sections',

        'actions' => [
            'index' => 'Sections',
            'create' => 'New Section',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'language' => 'Language',
            'enabled' => 'Enabled',
            'hassection' => 'Hassection',
            'mcqs' => 'Mcqs',
            'author_id' => 'Author',
            'category_id' => 'Category',
            'book_id' => 'Book',
            'section_id' => 'Section',
            
        ],
    ],

    'question' => [
        'title' => 'Questions',

        'actions' => [
            'index' => 'Questions',
            'create' => 'New Question',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            'answer' => 'Answer',
            'marks' => 'Marks',
            'order' => 'Order',
            'type' => 'Type',
            'link' => 'Link',
            'unit_id' => 'Unit',
            
        ],
    ],

    'user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'cnic' => 'Cnic',
            'gender' => 'Gender',
            'country' => 'Country',
            'province' => 'Province',
            'district' => 'District',
            'professional' => 'Professional',
            'address' => 'Address',
            'email_verified_at' => 'Email verified at',
            'password' => 'Password',
            'active' => 'Active',
            
        ],
    ],

    'comment' => [
        'title' => 'Comments',

        'actions' => [
            'index' => 'Comments',
            'create' => 'New Comment',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'comment' => 'Comment',
            'user_id' => 'User',
            'status' => 'Status',
            'question_id' => 'Question',
            
        ],
    ],

    'orderhd' => [
        'title' => 'Orderhds',

        'actions' => [
            'index' => 'Orderhds',
            'create' => 'New Orderhd',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'order-hd' => [
        'title' => 'Orderhds',

        'actions' => [
            'index' => 'Orderhds',
            'create' => 'New Orderhd',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'order-hd' => [
        'title' => 'Order Hds',

        'actions' => [
            'index' => 'Order Hds',
            'create' => 'New Order Hd',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'session_id' => 'Session',
            'status' => 'Status',
            'user_id' => 'User',
            'name' => 'Name',
            'email' => 'Email',
            'phoneno' => 'Phoneno',
            'address' => 'Address',
            'company' => 'Company',
            'amount' => 'Amount',
            'orderNo' => 'OrderNo',
            'expired_at' => 'Expired at',
            'city' => 'City',
            'state' => 'State',
            'zip' => 'Zip',
            'note' => 'Note',
            'paid' => 'Paid',
            'payment_method' => 'Payment method',
            'transaction_no' => 'Transaction no',
            'transaction_attachment' => 'Transaction attachment',
            
        ],
    ],

    'slide' => [
        'title' => 'Slides',

        'actions' => [
            'index' => 'Slides',
            'create' => 'New Slide',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'description' => 'Description',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];