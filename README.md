This app is my online art gallery built with Laravel and Tailwind CSS where users can perform full CRUD operations
— create, read, update, and delete artworks. 
Each piece displays details like title, artist, year, price, comments along with an image. Users can also like and zoom in artworks, 
view their favorites and see a color palette generated from each image, giving a complete overview of the artwork.

Server-side frameworks like Laravel handle routing, database management, authentication, and logic on the server, ensuring security, scalability, and efficient data handling before sending results to the user’s browser.

My app follows the MVC (Model-View-Controller) structure in Laravel, separating logic, data, and presentation. It uses migrations for database design, Tailwind CSS for styling, and features like CRUD operations, likes, and color extraction to deliver a clean, interactive user experience.

I used Laravel migrations to set up the database, including a liked column to track favorites. Users can like artworks and view their favorites. This allows users to view a dedicated list of the artworks, creating a personalized gallery experience.

Additionally, I integrated the Color Extractor package, which automatically analyzes each artwork’s image to generate a color palette. 
These palettes are displayed below the artworks, adding a visually engaging layer and helping users quickly understand the artwork’s dominant colors.


Overall, the app combines functionality, responsive frontend design and interactive visual features, making it a practical tool for 
managing artworks and an enjoyable experience for users exploring my gallery.
