# User Directory Feature

## Overview
The user directory feature displays all registered users on the homepage, allowing visitors to browse and connect with members of the school community.

## Implementation Details

### Frontend
- **File**: [resources/views/welcome.blade.php](file:///d:/Projects/school/school-management/resources/views/welcome.blade.php)
- **Location**: Below the latest news section
- **Layout**: Responsive grid (2-6 columns depending on screen size)
- **Features**:
  - User profile photos with fallback to default icons
  - User names and email addresses
  - Hover animations and transitions
  - "You" badge for current user identification
  - Direct links to user profiles

### Backend
- **Controller**: [app/Http/Controllers/PostController.php](file:///d:/Projects/school/school-management/app/Http/Controllers/PostController.php)
- **Method**: `showHomepagePosts()`
- **Functionality**: Fetches all users except the current user and passes them to the view

### Database
- **Seeder**: [database/seeders/PostSeeder.php](file:///d:/Projects/school/school-management/database/seeders/PostSeeder.php)
- **Migration**: [database/migrations/2025_09_20_114912_add_photo_to_users_table.php](file:///d:/Projects/school/school-management/database/migrations/2025_09_20_114912_add_photo_to_users_table.php)
- **Model**: [app/Models/User.php](file:///d:/Projects/school/school-management/app/Models/User.php) (with photo attribute)

## How It Works
1. When a user visits the homepage, the `showHomepagePosts()` method is called
2. The method fetches all users from the database, excluding the current user
3. Users are ordered alphabetically by name
4. The user data is passed to the welcome view
5. The view renders each user in a responsive grid card
6. Clicking on a user card navigates to their profile page

## Customization
- To modify the grid layout, edit the `grid-cols-*` classes in the welcome.blade.php file
- To change the styling, modify the CSS classes on the user card elements
- To include additional user information, modify both the controller and the view

## Testing
- Feature tests are available in [tests/Feature/HomepageUserDirectoryTest.php](file:///d:/Projects/school/school-management/tests/Feature/HomepageUserDirectoryTest.php)
- Run tests with: `php artisan test --filter=HomepageUserDirectoryTest`