import pandas as pd
import numpy as np
from sklearn.preprocessing import OneHotEncoder
import text_cnn

def score():
    data = pd.read_csv('C:\\Users\\sony\\Desktop\\responses.csv')
    pd.set_option('display.max_columns',200)
    data.head(2)

    print(data.shape)
    print(data.describe())

    numerical_data = data._get_numeric_data()
    categorical_data = data.select_dtypes(include=['object'])
    for column in numerical_data:
        numerical_data[column].fillna(0, inplace=True)
        mean = int(np.median(numerical_data[column].unique())+.5)
        numerical_data[column] = numerical_data[column].apply(lambda x : 1 if x > mean else 0)

    for column in categorical_data.columns:
        categorical_data[column] = categorical_data[column].astype('category')
        categorical_data[column] = categorical_data[column].cat.codes

    categorical_data = categorical_data.replace(-1,10)
    print(categorical_data.shape)
    categorical_data=OneHotEncoder().fit_transform(categorical_data).toarray()
    print(categorical_data.shape)

    categorical_data=  pd.DataFrame(categorical_data)
    data_prepared = pd.concat([categorical_data,numerical_data],axis=1, join='inner')
    print(data_prepared.shape)

    dp = data_prepared.loc[:, ['Rock','Slow songs or fast songs','Folk','Country','Classical music'
                                                                                            ,'Musical','Pop'
                               ,'Metal or Hardrock','Punk','Hiphop, Rap','Reggae, Ska','Swing, Jazz',
                               'Rock n roll','Latino','Techno, Trance','Opera']]
    df = dp.sample(2, axis=1)
    z = list(df.iloc[-1].index)
    print(z)
    x=data_prepared[z[0]]
    y=data_prepared[z[1]]
    c = np.corrcoef(x,y)
    print(c[0,1])
