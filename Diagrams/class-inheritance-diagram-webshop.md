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
        #showHeader()
        #showContent()
    }

    class AboutDoc{
        #showHeader()
        #showContent()
    }


    class FormDoc{
        #showHeader()
        #showContent()
    }
    class ContactDoc{
        #showHeader()
        #showContent()
    }
    class LoginDoc{
        #showHeader()
        #showContent()
    }
    class RegisterDoc{
        #showHeader()
        #showContent()
    }



    class ProductServiceDoc{
        #showHeader()
        #showContent()
    }
    class WebshopDoc{
        #showHeader()
        #showContent()
    }
    class ShoppingcartDoc{
        #showHeader()
        #showContent()
    }
    class ProductDoc{
        #showHeader()
        #showContent()
    }


```
