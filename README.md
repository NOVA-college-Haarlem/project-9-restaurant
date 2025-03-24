# Restaurant Management System

## Project Overview

This Laravel project provides a restaurant management system with three existing models: Product, Category, and the default Laravel User model. Students must extend this foundation with individual features to showcase their Laravel skills in CRUD operations, relationships, validation, routing, and middleware.

## 1. Reservation System

### User Story 1: As a customer, I want to make a table reservation so that I can ensure seating at my preferred time.
- I can select a date and time for my reservation
- I can specify the number of guests
- I can add special requests or notes
- I receive a confirmation of my reservation

### User Story 2: As a restaurant manager, I want to manage reservations so that I can optimize table allocation.
- I can view all reservations in a calendar view
- I can approve, modify, or cancel reservations
- I can set available time slots and capacity limits
- I can assign specific tables to reservations

## 2. Staff Management

### User Story 1: As a restaurant owner, I want to manage staff information so that I can track employee details and schedules.
- I can add new staff members with their roles and contact information
- I can view, edit, and delete staff profiles
- I can assign staff to different shifts
- I can track staff attendance and hours

### User Story 2: As a shift manager, I want to create and manage staff schedules so that the restaurant is adequately staffed.
- I can create weekly or monthly schedules
- I can assign staff to specific shifts and sections
- I can handle time-off requests
- I can find replacements for absent staff

## 3. Customer Feedback

### User Story 1: As a customer, I want to provide feedback on my dining experience so that the restaurant can improve its service.
- I can rate my overall experience on a scale
- I can leave comments about food quality, service, and ambiance
- I can include photos with my feedback
- I can choose whether my feedback is public or private

### User Story 2: As a restaurant manager, I want to review and respond to customer feedback so that I can address concerns and acknowledge praise.
- I can view all customer feedback in one dashboard
- I can respond to individual feedback
- I can analyze feedback trends over time
- I can highlight positive feedback for staff recognition

## 4. Inventory Management

### User Story 1: As a kitchen manager, I want to track ingredient inventory so that I can manage stock levels efficiently.
- I can add and categorize inventory items
- I can update stock quantities manually
- I can set low stock alerts for essential ingredients
- I can view usage history for each ingredient

### User Story 2: As a purchasing manager, I want to generate purchase orders so that I can replenish depleted stock.
- I can create purchase orders based on low stock alerts
- I can specify quantities and suppliers
- I can track order status and delivery dates
- I can record received items against purchase orders

## 5. Digital Menu Board

### User Story 1: As a menu manager, I want to create and update digital menu displays so that customers can see current offerings.
- I can design menu layouts for different screens
- I can schedule menu changes for different times of day
- I can highlight special offers and promotions
- I can display nutritional information and allergens

### User Story 2: As a customer, I want to view the restaurant's digital menu so that I can browse options before ordering.
- I can see appealing images of menu items
- I can filter menu items by category or dietary preferences
- I can view detailed descriptions of dishes
- I can see price information clearly

## 6. Online Ordering

### User Story 1: As a customer, I want to place food orders online so that I can enjoy the restaurant's cuisine at home.
- I can browse the menu and select items
- I can customize orders according to preferences
- I can specify delivery or pickup
- I can pay securely online

### User Story 2: As a restaurant staff member, I want to manage incoming online orders so that I can prepare and deliver them efficiently.
- I can receive real-time notifications of new orders
- I can accept or reject orders based on capacity
- I can update order status as it progresses
- I can contact customers with any questions or updates

## 7. Table Management

### User Story 1: As a host/hostess, I want to manage table assignments so that I can seat guests efficiently.
- I can view the status of all tables at a glance
- I can assign parties to appropriate tables
- I can mark tables as occupied, reserved, or available
- I can manage waiting lists when all tables are full

### User Story 2: As a restaurant manager, I want to configure table layouts so that I can optimize the dining space.
- I can create and edit floor plans
- I can add, move, or remove tables
- I can specify table sizes and capacities
- I can designate sections for different staff members

## 8. Loyalty Program

### User Story 1: As a customer, I want to participate in a loyalty program so that I can earn rewards for my patronage.
- I can earn points for purchases
- I can view my current point balance and history
- I can redeem points for rewards
- I can see available rewards and their point requirements

### User Story 2: As a marketing manager, I want to configure loyalty program settings so that I can encourage repeat business.
- I can set point earning rates for different purchases
- I can create special promotions for loyalty members
- I can define available rewards and their point costs
- I can analyze loyalty program effectiveness

## 9. Payment Processing

### User Story 1: As a customer, I want to pay for my meal using various payment methods so that I can choose the most convenient option.
- I can pay with credit/debit cards
- I can split the bill between multiple people
- I can add a tip to my payment
- I can receive a digital receipt

### User Story 2: As a restaurant manager, I want to process and track payments so that I can manage revenue effectively.
- I can view all transactions in a central dashboard
- I can issue refunds when necessary
- I can reconcile daily sales
- I can generate financial reports

## 10. Special Events

### User Story 1: As an event coordinator, I want to create and manage special events so that I can offer unique dining experiences.
- I can set up event details including date, time, and theme
- I can create special menus for events
- I can manage ticket sales or reservations
- I can assign staff to specific events

### User Story 2: As a customer, I want to browse and book special events so that I can enjoy unique dining experiences.
- I can view upcoming events with details
- I can purchase tickets or make reservations
- I can see seating options and availability
- I can receive event confirmations and reminders

## 11. Waitlist Management

### User Story 1: As a host/hostess, I want to manage a digital waitlist so that I can efficiently seat walk-in customers.
- I can add customers to the waitlist with party size
- I can estimate and provide wait times
- I can notify customers when their table is ready
- I can remove customers from the waitlist

### User Story 2: As a customer, I want to join a digital waitlist so that I can be notified when a table is available.
- I can add myself to the waitlist remotely
- I can see my position in line and estimated wait time
- I can receive notifications about my wait status
- I can remove myself from the waitlist if my plans change

## 12. Menu Engineering

### User Story 1: As a restaurant owner, I want to analyze menu performance so that I can optimize profitability.
- I can see which menu items sell best
- I can identify high-profit vs. low-profit items
- I can categorize items by popularity and profitability
- I can receive suggestions for menu improvements

### User Story 2: As a chef, I want to manage recipes and costs so that I can ensure consistent quality and pricing.
- I can create and update standardized recipes
- I can calculate food costs for each menu item
- I can adjust portion sizes and ingredients
- I can track recipe changes over time

## 13. Nutritional Information

### User Story 1: As a menu manager, I want to add nutritional information to menu items so that customers can make informed choices.
- I can enter calorie counts and macronutrient information
- I can list allergens present in each dish
- I can highlight dietary attributes (vegetarian, vegan, gluten-free)
- I can update nutritional data when recipes change

### User Story 2: As a customer with dietary restrictions, I want to filter menu items based on nutritional criteria so that I can find suitable options.
- I can filter items by dietary preference
- I can exclude items containing specific allergens
- I can sort items by calorie count or other nutritional metrics
- I can view detailed nutritional information for any menu item

## 14. Kitchen Display System

### User Story 1: As a chef, I want to view incoming orders on a kitchen display so that I can prepare meals efficiently.
- I can see all active orders in one view
- I can mark items as in-progress or completed
- I can view special instructions for each order
- I can sort orders by priority or time

### User Story 2: As a restaurant manager, I want to monitor kitchen performance so that I can optimize operations.
- I can track preparation times for different menu items
- I can identify bottlenecks in the kitchen workflow
- I can compare actual preparation times against targets
- I can analyze historical performance data

## 15. Delivery Management

### User Story 1: As a delivery manager, I want to coordinate food deliveries so that customers receive timely, high-quality orders.
- I can assign drivers to delivery orders
- I can optimize delivery routes
- I can track delivery status in real-time
- I can manage delivery zones and fees

### User Story 2: As a customer, I want to track my delivery order so that I know when to expect my food.
- I can see when my order is being prepared
- I can view when my order has left the restaurant
- I can track my delivery driver's location in real-time
- I can receive notifications about delivery status changes

## 16. Supplier Management

### User Story 1: As a purchasing manager, I want to manage supplier information so that I can maintain relationships with vendors.
- I can store supplier contact details and terms
- I can track performance and reliability
- I can manage contracts and agreements
- I can compare prices across multiple suppliers

### User Story 2: As an inventory manager, I want to link ingredients to suppliers so that I can efficiently reorder stock.
- I can associate each inventory item with its suppliers
- I can view supplier-specific pricing and minimum order quantities
- I can generate purchase orders to specific suppliers
- I can record and track quality issues with supplies

## 17. Gift Cards

### User Story 1: As a marketing manager, I want to create and manage gift cards so that customers can purchase them as gifts.
- I can generate unique gift card codes
- I can set denomination options or allow custom amounts
- I can design physical and digital gift card templates
- I can track gift card sales and redemptions

### User Story 2: As a customer, I want to purchase and redeem gift cards so that I can give or receive the restaurant experience as a gift.
- I can buy physical or digital gift cards
- I can check my gift card balance
- I can apply gift card credit to my bill
- I can receive notifications about expiration dates

## 18. Analytics Dashboard

### User Story 1: As a restaurant owner, I want to view business analytics so that I can make data-driven decisions.
- I can see daily, weekly, and monthly sales trends
- I can analyze customer demographics and preferences
- I can identify peak business hours and slow periods
- I can compare performance across different metrics

### User Story 2: As a department manager, I want to access department-specific analytics so that I can optimize my area of responsibility.
- I can view metrics relevant to my department (kitchen, bar, service)
- I can set goals and track progress
- I can identify areas for improvement
- I can generate custom reports for my department

## 19. Allergy Management

### User Story 1: As a customer with allergies, I want to identify safe menu options so that I can dine without health concerns.
- I can specify my allergies in my customer profile
- I can filter menu items based on my allergies
- I can see clear warnings about potential allergens
- I can request special preparation to accommodate my allergies

### User Story 2: As a chef, I want to manage allergy information for menu items so that I can serve all customers safely.
- I can tag menu items with common allergens
- I can suggest modifications to accommodate allergies
- I can document cross-contamination risks
- I can communicate special preparation needs to kitchen staff

## 20. Catering Services

### User Story 1: As a catering manager, I want to create and manage catering packages so that I can offer services for events.
- I can create customizable catering menus
- I can set pricing for different package options
- I can manage catering staff assignments
- I can coordinate logistics for off-site events

### User Story 2: As a customer, I want to request catering services so that I can have restaurant-quality food at my event.
- I can browse catering options and packages
- I can request a quote for my specific needs
- I can book catering services with deposit payment
- I can communicate special requirements for my event
