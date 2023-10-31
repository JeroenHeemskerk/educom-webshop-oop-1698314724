```mermaid
---
title: Class Inheritance Diagram - Webshop
---
classDiagram
    note "+ = public, - = private, # = protected"
    %% A <|-- B means that class B inherits from class A %%
    HtmlDoc <|-- BasicDoc

    BasicDoc <|-- HomeDoc
    BasicDoc <|-- AboutDoc
    BasicDoc <|-- FormDoc
    BasicDoc <|-- ProductServiceDoc

    FormDoc <|-- ContactDoc
    FormDoc <|-- LoginDoc
    FormDoc <|-- RegisterDoc
        
    ProductServiceDoc  <|-- WebshopDoc
    ProductServiceDoc  <|-- ProductDoc
    ProductServiceDoc  <|-- ShoppingcartDoc


    class HtmlDoc{
       +show()
       -showHtmlStart()
       -showHeaderStart()
       #showHeaderContent()
       -showHeaderEnd()
       -showBodyStart()
       #showBodyContent()
       -showBodyEnd()
       -showHtmlEnd()
    }
    class BasicDoc{
        #data 
        +__construct(mydata)
        #showHeaderContent()
        -showTitle()
        -showCssLinks()
        #showBodyContent()
        #showHeader()
        -showMenu()
        #showContent()
        -showFooter()
    }
    class HomeDoc{
        #showHeaderContent()
        #showContent()
    }

    class AboutDoc{
        #showHeaderContent()
        #showContent()
    }


    class FormDoc{
        #showFormStart()
        #showFormField()
        #showFormEnd()
    }

    class ContactDoc{
        #data 
        #showHeader()
        #showContent()
    }

    class LoginDoc{
        #data 
        #showHeader()
        #showContent()
    }
    class RegisterDoc{
        #data 
        #showHeader()
        #showContent()
    }


    class ProductServiceDoc{
        #showHeader()
        #showContent()
        #showActionButton()
    }

    class WebshopDoc{
        #data      
        #showHeader()
        #showContent()
        -showProductCard()
        -showActionButton()
    }

    class ShoppingcartDoc{
        #data 
        #showHeader()
        #showContent()
        -showProductLine()
        -showActionButton()
    }

    class ProductDoc{
        #data 
        #showHeader()
        #showContent()
        -showProduct()
        -showActionButton()
    }



