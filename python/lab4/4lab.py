import pandas as pd
df = pd.read_csv('prima-indians-diabetes.csv', encoding='ansi')


def max_age():
    child_df = df.loc[(df['diabetes'] == 1)]
    print(child_df['years'].max())


def average_age():
    child_df = df.loc[(df['diabetes'] == 1)]
    print(round(int(child_df['years'].mean()), 2))


def correlation():
    print(round(df['weight'].cov(df['years']), 2))


def child_free():
    child_df = df.loc[(df['diabetes'] == 0) & (df['child_amount'] == 0)]
    print(str(child_df["child_amount"].count()))



def max_glucose():
    child_df = df.loc[(df['years'] >= 50)]
    print(child_df['glucose'].max())


def average_age_pressure_over_80():
    child_df = df.loc[(df['blood_pressure'] >= 80)]
    print(round(int(child_df['years'].mean()),2))


def over_60_patient_insulin():
    average_insulin = df['insulin'].mean()
    child_df = df.loc[(df['years'] > 60) & (df['insulin'] > average_insulin)]
    print(child_df.sort_values(by='years', ascending=False))


def zero():
    child_df = df.loc[(df['glucose'] == 0) | (df['blood_pressure'] >= 0) | (df['skin'] == 0)
                    | (df['insulin'] == 0) | (df['weight'] == 0)
                    | (df['diabetes_pedigree'] == 0) | (df['years'] == 0)]
    print(child_df.head())


while True:
    try:
        choice = int(input("\nВведите номер нужной категории: "
                           "\n1. Максимальный и средний возраст пациентов с установленным диабетом. "
                           "\n2. Параметры с максимальной корреляцией между собой, значение корреляции. "
                           "\n3. Доля бездетных среди пациентов с неустановленным диабетом. "
                           "\n4. Максимальная концентрация глюкозы у пациентов старше 50 лет. "
                           "\n5. Средний возраст пациентов с диастолическим давлением выше 80 "
                           "\n6. Список пациентов старше 60 с уровнем инсулина выше среднего,"
                           "отсортированный по возрастанию столбца Возраст. "
                           "\n7. Список записей с нулевыми значениями хотя бы одного параметра"
                           "(за исключением первого и последнего столбцов).\n"))
    except Exception as e:
        print(e)
        exit
    finally:
        if choice == 1:
            max_age()
            average_age()
        if choice == 2:
            correlation()
        if choice == 3:
            child_free()
        if choice == 4:
            max_glucose()
        if choice == 5:
            average_age_pressure_over_80()
        if choice == 6:
            over_60_patient_insulin()
        if choice == 7:
            zero()
